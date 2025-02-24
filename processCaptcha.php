<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_ip = $_SERVER['REMOTE_ADDR']; // Get user's IP address

    // Validate CAPTCHA
    if ($_POST["captcha"] === $_SESSION["captcha"]) {
        // echo "Verification successful. User is legitimate.";

        // Remove IP from blocked list
        $file = "blocked_ips.txt";
        if (file_exists($file)) {
            $blocked_ips = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $new_ips = array_filter($blocked_ips, function($ip) use ($user_ip) {
                return trim($ip) !== $user_ip; // Keep all IPs except the legitimate one
            });

            // Overwrite file with updated list
            file_put_contents($file, implode("\n", $new_ips) . "\n");
            header('location: index');
            exit;
        }
    } else {
        $error =  "Incorrect CAPTCHA. Please try again";
        include('solve-captcha.php');
        exit;
    }
}
?>
