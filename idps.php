<?php
// Enable error reporting (disable in production by changing 0 to 1)
error_reporting(E_ALL);
ini_set('display_errors', 0);

// Database connection
$host = 'localhost';
$dbname = 'fijorant_travels';
$username = 'fijorant_travels';
$password = 'Aledoy@@23301!';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Function to log threats
function logThreat($pdo, $threatType)
{
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'UNKNOWN';
    $requestUrl = $_SERVER['REQUEST_URI'];
    $requestData = json_encode($_REQUEST);
    $dateCreated = date('Y-m-d g:i:s A');
    $token = password_hash(random_bytes(16), PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("INSERT INTO idps_logs (ip_address, user_agent, request_url, request_data, threat_type, `dateTime`, token) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$ip, $userAgent, $requestUrl, $requestData, $threatType, $dateCreated, $token]);

    // Optional: Block the IP immediately
    file_put_contents("blocked_ips.txt", "$ip\n", FILE_APPEND);
}

// Function to check if IP is blocked
function isBlocked($ip)
{
    $blockedIps = file("blocked_ips.txt", FILE_IGNORE_NEW_LINES);
    return in_array($ip, $blockedIps);
}

// ** Step 4: Detection Mechanisms **

// 1. Block requests from known malicious IPs
$clientIp = $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';
if (isBlocked($clientIp)) {
    http_response_code(403);
    $message = "Your IP address has been temporarily blocked due to suspicious activity detected on our systems. This is a security measure to protect our users and prevent unauthorized access. If you're a legitimate user, please try again later or contact our support team to resolve the issue";
    include('security.php');
    exit;
}

// 2. Detect SQL Injection
$sqlInjectionPatterns = ['/(\bUNION\b|\bSELECT\b|\bDROP\b|\bINSERT\b|\bUPDATE\b|\bDELETE\b)/i'];
foreach ($_REQUEST as $key => $value) {
    foreach ($sqlInjectionPatterns as $pattern) {
        if (preg_match($pattern, $value)) {
            logThreat($pdo, "SQL Injection Attempt");
            $message = "Oops, something's not quite right! We've noticed some suspicious activity on this page, so we've blocked access to keep everything secure. If you're having trouble, our support team is here to help. Just click the link below to go back to the previous page or reach out to us for assistance.";
            include('security.php');
            exit;
        }
    }
}

// 3. Detect XSS (Cross-Site Scripting)
$xssPatterns = ['/<script.*?>.*?<\/script>/i', '/(onmouseover|onerror|onload)\s*=/i'];
foreach ($_REQUEST as $key => $value) {
    foreach ($xssPatterns as $pattern) {
        if (preg_match($pattern, $value)) {
            logThreat($pdo, "XSS Attack Attempt");
            $message = "Oops, something's not quite right! We've noticed some suspicious activity on this page, so we've blocked access to keep everything secure. If you're having trouble, our support team is here to help. Just click the link below to go back to the previous page or reach out to us for assistance.";
            include('security.php');
            exit;
        }
    }
}

// 4. Detect Brute Force Login Attempts (Limit 5 attempts per IP)
session_start();
if (!isset($_SESSION['failed_attempts'])) {
    $_SESSION['failed_attempts'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
    $_SESSION['failed_attempts']++;

    if ($_SESSION['failed_attempts'] > 5) {
        logThreat($pdo, "Brute Force Attempt");
        file_put_contents("blocked_ips.txt", "$clientIp\n", FILE_APPEND);
        $message = "Too many failed login attempts. Access blocked.";
        include('security.php');
        exit;
    }
}
