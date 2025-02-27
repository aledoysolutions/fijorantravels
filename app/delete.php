<?php

include('includes/connect.php');

if (!isset($_SERVER['HTTP_REFERER'])) {
    $error = "Invalid request method";
    header("Location: $return");
    exit;
} 


$tab = base64_decode($_GET['tab']);
    $return = base64_decode($_GET['return']);
    $token =  ($_GET['token']);

$query = "delete from $tab where token = '$token'";
$result = mysqli_query($conn,$query);

header("Location: $return");