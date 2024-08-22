<?php

$upload_directory = getcwd() . '/uploads/';
$relative_path = '/uploads/';

// Ensure the uploads directory exists
if (!is_dir($upload_directory)) {
    mkdir($upload_directory, 0777, true);
}


// Handle Video File
if (isset($_FILES['video_file'])) {
    $uploaded_video_file = $upload_directory . basename($_FILES['video_file']['name']);
    $temporary_file = $_FILES['video_file']['tmp_name'];

    if (move_uploaded_file($temporary_file, $uploaded_video_file)) {
        // Display the uploaded video file
        echo '<h3>Uploaded Video File:</h3>';
        echo '<video width="600" height="400" controls><source src="' . $relative_path . basename($_FILES['video_file']['name']) . '" type="video/mp4">Your browser does not support the video tag.</video>';
    } else {
        echo 'Failed to upload video file';
    }
}


echo '<pre>';
var_dump($_FILES);
exit;