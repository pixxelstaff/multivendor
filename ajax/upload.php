<?php
// Error handling and configuration
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$data = array();
// Define upload directory and allowed extensions
// Replace with your upload directory path
$allowed_extensions = array("image/jpg", "image/jpeg", "image/png", "image/webp");

// Check if image is uploaded and process it
if ($_FILES['upload']['error'] === UPLOAD_ERR_OK  && isset($_FILES["upload"])) {
    $name = $_FILES["upload"]["name"];
    $tmp_name = $_FILES['upload']['tmp_name'];
    $file_size = $_FILES["upload"]["size"];
    $type = $_FILES["upload"]["type"];
    if (in_array($type, $allowed_extensions)) {
        if ($file_size < 1048576) {

            $rand = rand(1, 1000000);
            $file_name = $rand . '-' . $name;
            $path = "../images/uploadimg/".$file_name;
            if (move_uploaded_file($tmp_name, $path)) {
                $data['file'] = $file_name;
                $data['uploaded'] = '1';
                $data['url'] = $path;
            } else {

                $data['uploaded'] = '0';
                $data['error']['message'] = "Error uploading file.";
            }
        } else {
            $data['uploaded'] = '0';
            $data['error']['message'] = "file size should less than or can be equal to 1 Mb.";
        }
    } else {
        $data['uploaded'] = '0';
        $data['error']['message'] = "only jpeg,jpg,webp,png is allowed.";
    }
} else {
    $data['uploaded'] = '0';
    $data['error']['message'] = "no image is upload.";
}

echo json_encode($data);

