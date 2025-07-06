<?php

require_once 'Database.php';

$successMsg = '';
$errorMsg = '';
$eventsFromDB = '';

#Handle Add Appointment
if($_SERVER['REQUEST_METHOD'] === "POST" && ($_POST['action'] ?? '') === "add"){
    $course = trim($_POST['course_name'] ?? '');
    $instructor = trim($_POST['instructor_name'] ?? '');
    $start = $_POST["start_date"] ?? '';
    $end = $_POST['end_date'] ?? '';

    if($course && $instructor && $start && $end){
        $db = new Database();

        $db->query(
            "INSERT INTO appointment(course_name, instructor_name, start_date, end_date) 
            VALUES(:course_name, :instructor_name, :start_date, :end_date)", [
                'course_name' => $course,
                'instructor_name' => $instructor,
                'start_date' => $start,
                'end_date' => $end
            ]
            );


        header("Location: " . $_SERVER["PHP_SELF"] . "?success=1");
        exit;
    }else {
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=1");
        exit;
    }
}

# Handle Edit Appointment
if($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST['action'] ?? '') === 'edit'){
    $id = $_POST["event_id"] ?? null;
    $course = trim($_POST["course_name"] ?? '');
    $instructor = trim($_POST["instructor_name"] ?? '');
    $start = $_POST['start_date'] ?? '';
    $end = $_POST['end_date'] ?? '';

    if($id && $course && $instructor && $start && $end){
        $db = new Database();

        $db->query(
            "UPDATE appointment SET course_name = :course_name, instructor_name = :instructor_name, start_date = :start_date, end_date = :end_date WHERE id = :id",
            [
                'id' => $id,
                'course_name' => $course,
                'instructor_name' => $instructor,
                'start_date' => $start,
                'end_date' => $end
            ]
        );

        header("Location: " . $_SERVER['PHP_SELF'] . "?success=2");
         exit;
    }else{
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=2");
         exit;
    }
}


#Handle Delete Appointment 
if($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["action"] ?? '') === "delete"){
    $id = $_POST['event_id'] ?? null;

    if($id){
        $db->query(
            "DELETE FROM appointment WHERE id = :id",
            [
                'id' => $id
            ]
        );
        header("Location: " . $_SERVER['PHP_SELF'] . "?success=3");
        exit;
    }else{
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=3");
        exit;
    }
}

#Success & Error Messages
if(isset($_GET["success"])){
    $successMsg = match($_GET['success']){
        '1' => "✅ Appointment added successfully",
        '2' => "✅ Appointment updated successfully",
        '3' => "🗑️ Appointment deleted successfully",
        default => ''
    };
}

if(isset($_GET["error"])){
    $errorMsg = ' ! Error occured. Please check your input.';
}


#Fetch All Appointments and Spread Over Date Range

$db = new Database();

$result = $db->fetchAll("SELECT * FROM appointment"); 