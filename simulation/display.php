<?php
$archiveDir = __DIR__ . '/../archive';

if (!isset($_GET['filename'])) {
    http_response_code(400);
    echo "Filename is required.";
    exit;
}

$filename = basename($_GET['filename']); // prevent directory traversal
$filepath = $archiveDir . '/' . $filename;

if (!file_exists($filepath)) {
    http_response_code(404);
    echo "File not found.";
    exit;
}

$extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

switch ($extension) {
    case 'pdf':
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        break;

    case 'dcm':
        header('Content-Type: application/dicom');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        break;

    default:
        http_response_code(415);
        echo "Unsupported file type.";
        exit;
}

header('Content-Length: ' . filesize($filepath));
readfile($filepath);
exit;
