<?php
if (isset($_GET['file'])) {
    $file = basename($_GET['file']);
    $filepath = "downloads/" . $file;

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    } else {
        echo "File not found.";
    }
} else {
    echo "Invalid request.";
}
?>
