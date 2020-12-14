<?php

include_once("../../config/database.php");

$method = @$_SERVER['REQUEST_METHOD'];
$action = @$_REQUEST['submit'];
$method = strtolower($method);
$action = strtolower($action);

//echo "$method => $action";die;

if($_SERVER['QUERY_STRING']) {
    $action = $_SERVER['QUERY_STRING'];
}

if($method === 'get' && $action === ''){
    login($method, $action);
}else if($method === 'get' && $action === 'register'){
    register($method, $action);
}else if($method === 'post' && $action === 'register'){
    register($method, $action);
}

function login($method, $action) {
    if($method === 'get' && ($action === 'login' || $action === '')) {
      //  echo getcwd();die;
        include_once("../../views/users/login-view.php");
        exit();
    }else if($method === 'post' && $action === 'login') {
        // Logic for login
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

}




?>