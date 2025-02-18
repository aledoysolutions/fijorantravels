<?php

$firstname = $_POST["f_name"];
$lastname = $_POST["l_name"];
$where = $_POST["where"];
$To = $_POST["to"];
$email = $_POST["email"];
$phonenumber = $_POST["phone_number"];
$price = $_POST["price"];
$date = $_POST["date"];

// Format first and last names to have the first letter capitalized
$firstname_convert = ucwords($firstname);
$lastname_convert = ucwords($lastname);

// Format price as currency
$price_currency = "$$price";

// Validation
if (!$firstname_convert || !$lastname_convert || !$where || !$To || !$email || !$phonenumber || !$price || !$date) {
    $msg = 'error';
    $comment = 'All information required!';
    include('book-a-trip.php');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg = 'error';
    $comment = 'Please enter a valid email';
    include('book-a-trip.php');
    exit;
}

if (strlen($phonenumber) != 11) {
    $msg = 'error';
    $comment = 'Please enter a valid GSM number';
    include('book-a-trip.php');
    exit;
}

// Prepare the content for the email and the text file
$content = 'FIRSTNAME: ' . $firstname_convert . "\n" .
    'LASTNAME: ' . $lastname_convert . "\n" .
    'WHERE: ' . $where . "\n" .
    'TO: ' . $To . "\n" .
    'EMAIL: ' . $email . "\n" .
    'PHONE_NUMBER: ' . $phonenumber . "\n" .
    'PRICE: ' . $price_currency . "\n" .
    'DATE: ' . $date . "\n" .
    '================================================' . "\n";

$to = 'Francisnwankwo37@gmail.com';  
$sub = 'Client Trip Booking Info';
$from = "From: noreply@aledoy.com";

if (!mail($to, $sub, $content, $from)) {
    $msg = 'error';
    $comment = 'Failed to send email.';
    include('book-a-trip.php');
    exit;
}

$myFile = fopen("book_a_trip_customers_data.txt", "a");
fwrite($myFile,$content);
fclose($myFile);

// Display success message
$msg = 'success';
include('book-a-trip.php');

// Clear all form values after submission
$firstname = $lastname = $where = $To = $email = $phonenumber = $price = $date = "";

?>
