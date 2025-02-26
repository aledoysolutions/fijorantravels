<?php

include('includes/connect.php');

$id = $_GET['id'];
$query = "delete from category where id = '$id'";
$result = mysqli_query($conn,$query);

include('blog_category.php');


?>