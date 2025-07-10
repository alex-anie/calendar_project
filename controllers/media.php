<?php

require_once '../dd.php';
require_once '../models/Database.php';

$error_statement = [];
$success_message = [];

$db = new Database();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $upload_dir = __DIR__ . '/uploads/';
    $allowed_mime_types = [
        'application/pdf',
        'image/jpeg',
        'image/png',
        'audio/mpeg',
        'audio/mp3',
        'video/mp4',
        'video/mpeg',
    ];

    if(!isset($_FILES['upload_file']) || $_FILES['upload_file']['error'] !== 0){
        $error_statement[] = "File upload failed.";
    }else {
        $file = $_FILES['upload_file'];
        $file_name = basename($file['name']);
        $file_tmp_path = $file['tmp_name'];
        $file_type = mime_content_type($file_tmp_path);
        $file_size = $file['size'];

        echo $file_name;

        // Validate Mime Type
        if(!in_array($file_type, $allowed_mime_types)){
            $error_statement[] = "Unsupported file type";
        }

        // Validate file size (Limit to 10MB)
        if($file_size > 10 * 1024 * 1024){
            $error_statement[] = "File too large (Max 10MB.)";
        }

        //if all validations pass, move file
        if(empty($error_statement)){
            $unique_name = time() . '_' . preg_replace('/\s+/', '_', $file_name);
            $destination = $upload_dir . $unique_name;
            $relative_path = '/uploads/' . $unique_name;
            // echo $destination;

            if(!is_dir($upload_dir)){
                mkdir($upload_dir, 0777, true);
            }

            if(move_uploaded_file($file_tmp_path, $destination)){
                try{
                    $db->query("INSERT INTO `files`(file_name, file_type, file_size, file_path) VALUES(:file_name, :file_type, :file_size, :file_path)", [
                        'file_name' => $file_name,
                        'file_type' => $file_type,
                        'file_size' => $file_size,
                        'file_path' => $relative_path
                    ]);

                    $success_message = "File uploaded successfully!";
                    header("Location: /media");
                    exit;
                }catch(PDOException $e){
                    $error_statement[] = "Database error: " . $e->getMessage();
                }
            }else {
                $error_statement[] = "Failed to move uploaded file.";
            }
        }
    }
}