<?php

require_once '../models/Database.php';

$error_statement = [];
$success_message = '';

$first_name = '';
$last_name = '';
$email = "";
$numbers = "";
$dob = ""; 
$age = ""; 
$website_url = ""; 
$social_profile = ""; 
$country = ""; 
$city = "";
$zip_code = ""; 
$currency = ""; 
$terms = ""; 
$message = ""; 

$db = new Database();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //Trim and Assign
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $numbers = trim($_POST['numbers']);
    $dob = $_POST['date_of_birth'];
    $age = $_POST['age'];
    $website_url = trim($_POST['website_url']);
    $social_profile = trim($_POST['social_profile']);
    $country = $_POST['country'];
    $city = $_POST['city'];
    $zip_code = trim($_POST['zip_code']);
    $currency = $_POST['currency'] ?? '';
    $terms = isset($_POST['terms']);
    $message = trim($_POST['message']);

    //Validations
    if(!preg_match("/^[a-zA-Z][a-zA-Z0-9_\.]{2,29}$/", $first_name)){
        $error_statement['first_name'] = "Invalid first name";
    }
    if(!preg_match("/^[a-zA-Z][a-zA-Z0-9_\.]{2,29}$/", $last_name)){
        $error_statement['last_name'] = "Invalid last name.";
     }
     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_statement['email'] = "Invalid email";
     }
     if(!preg_match("/^\d{7,15}$/", $numbers)){
        $error_statement['numbers'] = "Invalid phone number.";
     }
     if(empty($dob)){
        $error_statement['date_of_birth'] = "Date of birth is required.";
     }
     if(!filter_var($age, FILTER_VALIDATE_INT) || $age < 0 || $age > 120){
        $error_statement['age'] = "Invalid age.";
     }if(!filter_var($website_url, FILTER_VALIDATE_URL)){
        $error_statement['website_url'] = "Invalid website URL.";
     }
     if(!filter_var($social_profile, FILTER_VALIDATE_URL)){
        $error_statement['social_profile'] = "Invalid social profile.";
     }
     if(empty($country)){
        $error_statement['country'] = "Country is required.";
     }
     if(empty($city)){
        $error_statement['city'] = "City is required.";
     }
     if(!preg_match("/^\d{4,10}$/", $zip_code)){
        $error_statement['zip_code'] = "Invalid ZIP code.";
     }
     if(empty($currency)){
        $error_statement['currency'] = "Please Select a currency";
     }
     if(!$terms){
        $error_statement['terms'] = "You must accept the terms.";
     }
     if(strlen($message) < 5){
        $error_statement['message'] = "Message is too short";
     }

     if(empty($error_statement)){
        try{
            $db->query("INSERT INTO users (
                first_name, last_name, email, numbers, date_of_birth, age, website_url,
                social_profile, country, city, zip_code, currency, message
            ) VALUES (
                :first_name, :last_name, :email, :numbers, :dob, :age, :website_url,
                :social_profile, :country, :city, :zip_code, :currency, :message
            )", [
                'first_name'     => $first_name,
                'last_name'      => $last_name,
                'email'          => $email,
                'numbers'        => $numbers,
                'dob'            => $dob,
                'age'            => $age,
                'website_url'    => $website_url,
                'social_profile' => $social_profile,
                'country'        => $country,
                'city'           => $city,
                'zip_code'       => $zip_code,
                'currency'       => $currency,
                'message'        => $message
            ]);

            $_SESSION['success'] = "Form submitted successfully!";
            header("Location: /more");
            exit;

        } catch (PDOException $e) {
            if ($e->getCode() === '23000') {
                $error_statement['duplicate'] = "Duplicate entry.";
            } else {
                throw $e;
            }
        }
    }
}

