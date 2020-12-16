<?php
session_start();

include_once("../../config/database.php");

$method = @$_SERVER['REQUEST_METHOD'];
$action = @$_POST['submit']; // through form submit
$method = strtolower($method);
$action = strtolower($action);

//echo "$method => $action";die;

if($_SERVER['QUERY_STRING']) {
    $action = $_SERVER['QUERY_STRING']; // through get call
}

//echo "<pre>"; print_r($_SESSION);die;

if(!isLoggedIn()){
    if($action !== 'register') {
        $action = 'login';
        //$method = 'get';
        login($method, $action);
    }
}else{
    die("User has been loggedin");
}

if($method === 'get' && ($action === '' || $action === 'login')){
    login($method, $action);
}else if(($method === 'get' || $method === 'post') && $action === 'register'){
    register($method, $action);
}/*else if($method === 'post' && $action === 'register'){
    register($method, $action);
}*/

function login($method, $action) {
    if($method === 'get' && ($action === 'login' || $action === '')) {
        include_once("../../views/users/login-view.php");
        exit();
    }else if($method === 'post' && $action === 'login') {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $_SESSION['username'] = $user_name;
        die("Successfully loggedin.");
    }
}


function register($method, $action){
    if($method === 'get' && $action === 'register') {
        include_once("../../views/users/registration-view.php");
        exit();
    }else if($method === 'post' && $action === 'register') {
        // Logic for registration

        echo "<pre>"; print_r($_REQUEST);die;
    }
}


function isLoggedIn() {
    $status = false;
    if(@$_SESSION['username']) {
        $status = true;
    }
    return $status;
}




?>