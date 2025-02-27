<?php
session_start();
include('includes/connect.php');
require_once('includes/fns.php');

$blog_title = mysqli_real_escape_string($conn, $_POST['title']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$blog_content = mysqli_real_escape_string($conn, $_POST['blog_content']);
$date_posted = mysqli_real_escape_string($conn, $_POST['date_posted']);
$image_extensions = ["jpg", "jpeg", "png", "gif"];

if(empty($blog_title)){
    $error = 'Blog title is required';
    include('./blog_form.php');
    exit;
}

if(empty($location)){
    $error = 'Location is required';
    include('./blog_form.php');
    exit;
}

if(empty($blog_content)){
    $error = 'Blog content is required';
    include('./blog_form.php');
    exit;
}

function validateImage($file) {
    global $image_extensions;
    return isset($file['tmp_name']) && !empty($file['tmp_name']) &&
           in_array(strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)), $image_extensions);
}

// Blog image (Required)
if (!validateImage($_FILES['image_path'])) {
    $error = 'Blog image is required and must be a valid image (jpg, png, jpeg, gif).';
    include('./blog_form.php');
    exit;
}

$image1_tmp = $_FILES['image_path']['tmp_name'];
$image1_ext = strtolower(pathinfo($_FILES['image_path']['name'], PATHINFO_EXTENSION));

// Optional Images (Only process if provided)
// $image2_tmp = validateImage($_FILES['image_path2']) ? $_FILES['image_path2']['tmp_name'] : null;
// $image2_ext = $image2_tmp ? strtolower(pathinfo($_FILES['image_path2']['name'], PATHINFO_EXTENSION)) : null;

// $image3_tmp = validateImage($_FILES['image_path3']) ? $_FILES['image_path3']['tmp_name'] : null;
// $image3_ext = $image3_tmp ? strtolower(pathinfo($_FILES['image_path3']['name'], PATHINFO_EXTENSION)) : null;

// Insert product data
$query = "INSERT INTO blog (title, content,blog_location, date_posted,token) VALUES ('$blog_title', '$blog_content', '$location','$date_posted', '".createToken()."')";
if (!mysqli_query($conn, $query)) {
    $error = 'Error inserting blog details.';
    include('./blog_form.php');
    exit;
}

$id = mysqli_insert_id($conn);

// Upload Image 1 (Required)
$image1_path = "uploads/blog_image/img{$id}.{$image1_ext}";
move_uploaded_file($image1_tmp, $image1_path);
mysqli_query($conn, "UPDATE blog SET blog_img = '$image1_path' WHERE id = '$id'");

// // Upload Image 2 (Optional)
// if ($image2_tmp) {
//     $image2_path = "uploads/product_form_image/img2{$id}.{$image2_ext}";
//     move_uploaded_file($image2_tmp, $image2_path);
//     mysqli_query($conn, "UPDATE product SET image_path2 = '$image2_path' WHERE id = '$id'");
// }

// // Upload Image 3 (Optional)
// if ($image3_tmp) {
//     $image3_path = "uploads/product_form_image/img3{$id}.{$image3_ext}";
//     move_uploaded_file($image3_tmp, $image3_path);
//     mysqli_query($conn, "UPDATE product SET image_path3 = '$image3_path' WHERE id = '$id'");
// }

$success = 'Details have been updated successfully.';
include('./blog_form.php');
exit;
?>
