<?php

$upload_directory = getcwd() . '/uploads/';
$relative_path = '/uploads/';

// Ensure the uploads directory exists
if (!is_dir($upload_directory)) {
    mkdir($upload_directory, 0777, true);
}

// Handle Image File
if (isset($_FILES['image_file'])) {
    $uploaded_image_file = $upload_directory . basename($_FILES['image_file']['name']);
    $temporary_file = $_FILES['image_file']['tmp_name'];

    if (move_uploaded_file($temporary_file, $uploaded_image_file)) {
        // Display the uploaded image file
        echo '<h3>Uploaded Image File:</h3>';
        echo '<img src="' . $relative_path . basename($_FILES['image_file']['name']) . '" width="600" height="400">';
    } else {
        echo 'Failed to upload image file';
    }
}


echo '<pre>';
var_dump($_FILES);
exit;