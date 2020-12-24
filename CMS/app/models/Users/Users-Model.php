<?php
include_once("app/config/database.php");
//var_dump($conn);


$username = $_POST['user_name'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = $_POST['password'];
echo "<pre>";print_r($_POST);
$password = md5($password);
// add other fields
$email = $_POST['email'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];
$country = $_POST['country'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$course = implode(',',$_POST['course']);
$gender= $_POST['gender'];



$query = " INSERT INTO users (user_name, first_name, last_name, password)
                        VALUES('$username', '$first_name', '$last_name', '$password')";
$result = mysqli_query($conn, $query);

// $query = " INSERT INTO employee (user_name, first_name, last_name, password,email,address,mobile,country,state,zip,course,gender)
// VALUES('$username', '$first_name', '$last_name', '$password','$email ','$address','$mobile','$country','$state','$zip','$course','$gender')";
// $result = mysqli_query($conn, $query);

die("Done");
// return $result;


/*function setRegister() {
global $conn;
    var_dump($conn);
    die("ok");
    /*$username = $_POST['user_name'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $query = " INSERT INTO employee (user_name, first_name, last_name) VALUES('$username', '$first_name', '$last_name')";

    $result = mysqli_query($conn, $query);*/

   // return $result;
//}*/

function setLogin() {

}

?>