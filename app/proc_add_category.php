<?php
session_start();
include('includes/connect.php');
require_once('includes/fns.php');

$category = mysqli_real_escape_string($conn, $_POST['category']);


$query = "insert into category set cat_name = '$category'";
$result = mysqli_query($conn, $query);

if($result)
{
    $success = 'Category have been updated successfully.';
    include('./category.php');
    exit;
}else{
    $error = 'Error inserting category details.';
    include('./category.php');
    exit;
}


?>