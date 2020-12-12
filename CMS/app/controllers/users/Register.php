<?php
session_start();
include_once("../../config/database.php");

$token = $_SESSION['token'];
$form_token = $_POST['token'];
//echo $_SESSION['token'].'<br>';

//echo "<pre>";print_r($_REQUEST);die;
//echo "$token === $form_token";die;

//if($token == $form_token) // check only value
//if($token === $form_token) // check value and data type both

if($token == $form_token) {
    $username = $_POST['user_name'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    unset($_SESSION['token']);
    //echo $_SESSION['token'].'<br>';
    ///echo "<pre>";print_r($_REQUEST);
    if (isset($username) && isset($first_name) && isset($last_name)) {
        $query = " INSERT INTO employee (user_name, first_name, last_name) VALUES('$username', '$first_name', '$last_name')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo " <script>alert('Data has been inserted.');</script>";
        } else {
            die("Something has been wrong: " . $query);
        }

        // echo "<pre>";print_r($_REQUEST);die;
    }
}else{
    ///echo "$token === $form_token";
    die("You are not allowed to do this action.");
}




?>