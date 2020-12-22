<?php
@session_start();

// include_once("app/config/database.php");
function login($method, $action) {
    if($method === 'get' && ($action === 'login' || $action === '')) {
        include_once("app/views/users/login-view.php");
        exit();
    }else if($method === 'post' && $action === 'login') {
        include_once("app/config/database.php");

        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $password = md5($password);
        $query = " SELECT * FROM users WHERE user_name = '$user_name' AND password = '$password'";
        $query = mysqli_query($conn, $query);
        if(mysqli_num_rows($query) > 0 ){
            $result = mysqli_fetch_assoc($query);
            $user_name = $result['user_name'];
            $id = $result['id'];
            $_SESSION['username'] = $user_name;
            $_SESSION['id'] = $id;
            header("Location: ?");
        }else{
            die("Username and password is wrong.");
        }

       // die("Successfully loggedin.");
    }
}


function register($method, $action){
    if($method === 'get' && $action === 'register') {
        $token = (rand(10,10000000000));
        $_SESSION['token'] = $token;
        include_once("app/views/users/registration-view.php");
        exit();
    }else if($method === 'post' && $action === 'register') {
        include_once("app/models/Users/Users-Model.php");
        //global $conn;

        //echo setRegister();die;
        echo "<pre>"; print_r($_REQUEST);die;
    }
}

function logout() {
    session_destroy();
    header("Location: ?");
}


?>