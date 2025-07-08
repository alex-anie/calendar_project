<?php

// session_start();

require_once '../models/Database.php';

$name = '';
$error_statement = [];

$db = new Database();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $name = preg_replace('/\s+/', ' ', $name); // Collapse multiple white spaces
    $name = trim($name, "-'\"! "); // trim characters in the second argument from the name
    
    // Validate Text
    if(empty($name)){
        $error_statement[] = "Please provide a name";
    }elseif(strlen($name) <= 2){
        $error_statement[] = "Name must be at least 3 characters.";
    }elseif(strlen($name) > 50){
        $error_statement[] = "Name must not exceed 50 characters.";
    }elseif(!preg_match("/^[\p{L}\p{M} '-]+$/u", $name)){
        $error_statement[] = "Invalid characters in name.";
    }

    var_dump($name);

    if(empty($error_statement)){
            $db->query("INSERT INTO names(names) VALUES(:name)", [
            'name' => $name
        ]);

        $_SESSION['success'] = "Name successfully added.";
        header("Location: /name");
        exit;
    }
}

// echo '<p style="color:green;margin-top:10px;">Success</p>';
