<?php
// Database
require_once '../../../database/config.php';

if (isset($_POST)) {

    $uploadsDir = "uploads/";
    $allowedFileType = array('jpg', 'png', 'jpeg');

    // Velidate if files exist
    if (!empty(array_filter($_FILES['thumbnails']['name']))) {

        // Loop through file items
        foreach ($_FILES['thumbnails']['name'] as $id => $val) {
            // Get files upload path
            $fileName = $_FILES['thumbnails']['name'][$id];
            $tempLocation = $_FILES['thumbnails']['tmp_name'][$id];
            $targetFilePath = $uploadsDir . $fileName;
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $uploadDate = date('Y-m-d H:i:s');
            $uploadOk = 1;
            if (in_array($fileType, $allowedFileType)) {
                if (move_uploaded_file($tempLocation, $targetFilePath)) {
                    $sqlVal = "('" . $fileName . "', '" . $uploadDate . "')";
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "File coud not be uploaded.",
                    );
                }

            } else {
                $response = array(
                    "status" => "alert-danger",
                    "message" => "Only .jpg, .jpeg and .png file formats allowed.",
                );
            }
            // Add into MySQL database
            if (!empty($sqlVal)) {
                $insert = $conn->query("INSERT INTO user (images, date_time) VALUES $sqlVal");
                if ($insert) {
                    $response = array(
                        "status" => "alert-success",
                        "message" => "Files successfully uploaded.",
                    );
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Files coudn't be uploaded due to database error.",
                    );
                }
            }
        }
    } else {
        // Error
        $response = array(
            "status" => "alert-danger",
            "message" => "Please select a file to upload.",
        );
    }
}