<?php
include_once("app/config/database.php");

function setRegister() {
    global $conn;
    $username = $_POST['user_name'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $query = " INSERT INTO employee (user_name, first_name, last_name) VALUES('$username', '$first_name', '$last_name')";

    $result = mysqli_query($conn, $query);

    return $result;
}

?>