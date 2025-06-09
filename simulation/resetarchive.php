<?php
$archiveDir = realpath(__DIR__ . '/../archive'); 

// Safety check: ensure it's really the correct folder
if (!$archiveDir || !is_dir($archiveDir)) {
    http_response_code(500);
    echo "Archive folder not found.";
    exit;
}

// Loop through all files and delete them
$files = glob($archiveDir . '/*.pdf'); // Get all file paths
$deleted = 0;

foreach ($files as $file) {
    if (is_file($file)) {
        if (unlink($file)) {
            $deleted++;
        }
    }
}

// Loop through all files and delete them
$files = glob($archiveDir . '/*.dcm'); // Get all file paths

foreach ($files as $file) {
    if (is_file($file)) {
        if (unlink($file)) {
            $deleted++;
        }
    }
}


header("Location: /simulation/listarchive.php");

