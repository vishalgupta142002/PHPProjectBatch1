<?php
@session_start();


function login($method, $action) {
    if($method === 'get' && ($action === 'login' || $action === '')) {
        include_once("app/views/users/login-view.php");
        exit();
    }else if($method === 'post' && $action === 'login') {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $_SESSION['username'] = $user_name;
        header("Location: ?");
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
        echo setRegister();die;
        echo "<pre>"; print_r($_REQUEST);die;
    }
}

function logout() {
    session_destroy();
    header("Location: ?");
}


?>