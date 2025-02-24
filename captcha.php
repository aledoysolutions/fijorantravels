<?php
session_start();

// Allow GET requests for CAPTCHA image
if ($_SERVER["REQUEST_METHOD"] !== "GET" && ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_SERVER['HTTP_REFERER']) || empty($_SERVER['HTTP_REFERER']))) {
    http_response_code(403); // Forbidden
    exit("Unauthorized access.");
}

// Set response type as an image
header("Content-type: image/png");

// Generate a random CAPTCHA code
$captcha_code = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0, 6);
$_SESSION["captcha"] = $captcha_code;

// Create an image for the CAPTCHA
$image = imagecreate(120, 50);
$bg_color = imagecolorallocate($image, 255, 255, 255); // White background
$text_color = imagecolorallocate($image, 0, 0, 0); // Black text

// Add random noise (dots) to make it harder for bots
for ($i = 0; $i < 100; $i++) {
    imagesetpixel($image, rand(0, 120), rand(0, 50), $text_color);
}

// Draw the CAPTCHA text
imagestring($image, 5, 20, 15, $captcha_code, $text_color);

// Output the image and free memory
imagepng($image);
imagedestroy($image);
?>
