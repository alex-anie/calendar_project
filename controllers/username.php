<?php

require_once '../models/Database.php';

$username = '';
$error_statement = [];

$db = new Database();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = trim($_POST['usernames']);
    $username = preg_replace('/\s+/', ' ', $username); //Collapse multiple white spaces
    $username = trim($username, "-'\"! ", ); //Trim characters in the second argument from the name

    //Validate Text
    if(empty($username)){
        $error_statement[] = "Please provide a username";
    }elseif(strlen($username) < 3){
        $error_statement[] = "Username must be at least 3 characters.";
    }elseif(strlen($username) > 30){
        $error_statement[] = "Username must not exceed 30 characters.";
    }elseif(!preg_match("/^[a-zA-Z][a-zA-Z0-9_\.]{2,29}$/", $username)){
        $error_statement[] = "Username must start with a letter and contain only letters, numbers, underscores, or dots.";
    }

    var_dump($username);

    if(empty($error_statement)){
        try{
              $db->query("INSERT INTO `usernames`(usernames) VALUES(:usernames)", [
            'usernames' => $username
            ]);

            $_SESSION['success'] = "Username successfully inserted";
            header("Location: /username");
            exit;

        }catch(PDOException $e){
            if($e->getCode() === '23000'){ // Integrity constraint violation
                $error_statement[] = "Username already exists.";
            }else {
                throw $e; // Other database errors
            }
        }
    }
}

