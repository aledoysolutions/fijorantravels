<?php
session_start();
include('includes/connect.php');
require_once('includes/fns.php');

$token = mysqli_real_escape_string($conn, $_POST['token']);
$id = get_val('product', 'token', $token, 'id');
$destination = mysqli_real_escape_string($conn, $_POST['destination']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$destinationLocation = mysqli_real_escape_string($conn, $_POST['destinationLocation']);

$image_extensions = ["jpg", "jpeg", "png", "gif"];

function validateImage($file) {
    global $image_extensions;
    return isset($file['tmp_name']) && !empty($file['tmp_name']) &&
           in_array(strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)), $image_extensions);
}

// Validate required fields
if (empty($destination)) {
    $error = 'Destination is required';
    include('edit-products.php');
    exit;
}

if (empty($price)) {
    $error = 'Price is required';
    include('edit-products.php');
    exit;
}

if (empty($destinationLocation)) {
    $error = 'Destination Location is required';
    include('edit-products.php');
    exit;
}

// Fetch existing image paths from the database
$query = "SELECT image_path, image_path2, image_path3 FROM product WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$existing_images = mysqli_fetch_assoc($result);

$existing_image1 = $existing_images['image_path'];
$existing_image2 = $existing_images['image_path2'];
$existing_image3 = $existing_images['image_path3'];

// Validate new image uploads
$image1_tmp = $_FILES['image_path']['tmp_name'] ?? null;
$image1_ext = $image1_tmp ? strtolower(pathinfo($_FILES['image_path']['name'], PATHINFO_EXTENSION)) : null;

$image2_tmp = validateImage($_FILES['image_path2']) ? $_FILES['image_path2']['tmp_name'] : null;
$image2_ext = $image2_tmp ? strtolower(pathinfo($_FILES['image_path2']['name'], PATHINFO_EXTENSION)) : null;

$image3_tmp = validateImage($_FILES['image_path3']) ? $_FILES['image_path3']['tmp_name'] : null;
$image3_ext = $image3_tmp ? strtolower(pathinfo($_FILES['image_path3']['name'], PATHINFO_EXTENSION)) : null;

// **Fix: Only require Image 1 if it's missing in the database and not uploaded**
if (!$existing_image1 && !$image1_tmp) {
    $error = 'Image 1 is required because none exists.';
    include('edit-products.php');
    exit;
}

// Update product details (without affecting images)
$query = "UPDATE product SET 
            destination = '$destination', 
            price = '$price', 
            destinationLocation = '$destinationLocation'
          WHERE id = '$id'"; 

if (!mysqli_query($conn, $query)) {
    $error = 'Could not update product details.';
    include('edit-products.php');
    exit;
}

// **Only update image fields when a new file is uploaded**

// Upload Image 1 (only if a new file is provided)
if ($image1_tmp) {
    $image1_path = "uploads/product_form_image/img1_{$id}.{$image1_ext}";
    move_uploaded_file($image1_tmp, $image1_path);
    mysqli_query($conn, "UPDATE product SET image_path = '$image1_path' WHERE id = '$id'");
}

// Upload Image 2 (only if a new file is provided)
if ($image2_tmp) {
    $image2_path = "uploads/product_form_image/img2_{$id}.{$image2_ext}";
    move_uploaded_file($image2_tmp, $image2_path);
    mysqli_query($conn, "UPDATE product SET image_path2 = '$image2_path' WHERE id = '$id'");
}

// Upload Image 3 (only if a new file is provided)
if ($image3_tmp) {
    $image3_path = "uploads/product_form_image/img3_{$id}.{$image3_ext}";
    move_uploaded_file($image3_tmp, $image3_path);
    mysqli_query($conn, "UPDATE product SET image_path3 = '$image3_path' WHERE id = '$id'");
}

$success = 'Product details have been updated successfully.';
include('edit-products.php');
exit;
?>
