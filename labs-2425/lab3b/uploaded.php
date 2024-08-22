<?php

$upload_directory = getcwd() . '/uploads/';
$relative_path = '/uploads/';
// Ensure the uploads directory exists
if (!is_dir($upload_directory)) {
    mkdir($upload_directory, 0777, true);
}

// Handle PDF File
if (isset($_FILES['pdf_file'])) {
    $uploaded_pdf_file = $upload_directory . basename($_FILES['pdf_file']['name']);
    $temporary_file = $_FILES['pdf_file']['tmp_name'];

    if (move_uploaded_file($temporary_file, $uploaded_pdf_file)) {
        // Display the uploaded PDF file
        echo '<h3>Uploaded PDF File:</h3>';
        echo '<embed src="' . $relative_path . basename($_FILES['pdf_file']['name']) . '" width="600" height="500" type="application/pdf">';
    } else {
        echo 'Failed to upload PDF file';
    }
}
    
//Handles the Audio File
if (isset($_FILES['audio_file'])) {
    $uploaded_audio_file = $upload_directory . basename($_FILES['audio_file']['name']);
    $temporary_file = $_FILES['audio_file']['tmp_name'];

    if (move_uploaded_file($temporary_file, $uploaded_audio_file)) {
        // Display the uploaded audio file
        echo '<h3>Uploaded Audio File:</h3>';
        echo '<audio controls><source src="' . $relative_path . basename($_FILES['audio_file']['name']) . '" type="audio/mpeg">Your browser does not support the audio element.</audio>';
    } else {
        echo 'Failed to upload audio file';
    }
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