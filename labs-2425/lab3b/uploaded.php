<?php

$upload_directory = getcwd() . '/uploads/';
$relative_path = '/uploads/';

// Ensure the uploads directory exists
if (!is_dir($upload_directory)) {
    mkdir($upload_directory, 0777, true);
}


// Handle Audio File
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


echo '<pre>';
var_dump($_FILES);
exit;