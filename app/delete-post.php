<?php

include('includes/connect.php');

$token = $_GET['token'];
$query = "delete from blog where token = '$token'";
$result = mysqli_query($conn,$query);

include('blog_post.php');


?>