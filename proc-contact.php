<?php
include('app/includes/connect.php');
require_once('app/includes/fns.php');
require_once('PHPMailer/PHPMailerAutoload.php');

if (!isset($_SERVER['HTTP_REFERER'])) {
    $error = "Invalid request method";
    include('contact.php');
    exit;
}

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
$travel_date = mysqli_real_escape_string($conn, $_POST['travel_date']);
$information = mysqli_real_escape_string($conn, $_POST['information']);

if (isset($_GET['token'])) {
    $destination = mysqli_real_escape_string($conn, $_POST['destination']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    $otherInfo = "
    Destination :  $destination <br>
    Price :  $price <br> ";
}

$name_convert = ucwords($name);

if (!$name || !$email || !$contact_number || !$travel_date || !$information) {
    $msg = 'error';
    $comment = 'All information required';
    include('contact.php');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg = 'error';
    $comment = 'Please enter a valid email';
    include('contact.php');
    exit;
}

if (strlen($contact_number) != 11) {
    $msg = 'error';
    $comment = 'Please enter valid GSM number';
    include('contact.php');
    exit;
}

if (strlen($information) > 30) {
    $msg = 'error';
    $comment = 'Additional information shouln\'t be more than 30 Words.';
    include('contact.php');
    exit;
}


//write the code to send the details to email

$content = 'Name: ' . $name_convert . "<br>" .
    'Email : ' . $email . "<br>" .
    'Contact_number : ' . $contact_number . "<br>" .
    'Travel Date : ' . $travel_date . "<br>" .
    'Information : ' . $information . "<br>" .
    "$otherInfo".
    '================================================' . "\n";

$to = 'akerelejohn6@gmail.com';
$subject = 'Client Trip Booking Info';
$from = "From: noreply@aledoy.com";

send_email($to, organisation(), $name, $subject, $content);


$msg = 'success';
$destination = '';
$price = '';
include('contact.php');
