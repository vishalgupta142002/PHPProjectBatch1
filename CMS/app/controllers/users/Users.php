<?php
@session_start();

include_once("../../config/database.php");
include_once("../../helpers/users-utils.php");



//echo "$method => $action";die;

if($_SERVER['QUERY_STRING']) {
    $action = $_SERVER['QUERY_STRING']; // through get call
}

//echo "<pre>"; print_r($_SESSION);die;
http://localhost/tutorials/PHPProjectBatch1/CMS
if(!isLoggedIn()){ // User is not loggedin
    if(empty($action)){
        include_once("../../views/layouts/header.php");
        include_once("../../views/layouts/footer.php");
    }
    else if($action !== 'register') {
        $action = 'login';
        //$method = 'get';
        login($method, $action);
    }
}else{ // User is loggedin
    include_once("../../views/layouts/header.php");
    include_once("../../views/layouts/footer.php");
    die("User has been loggedin");
}

if($method === 'get' && ($action === 'login')){
    login($method, $action);
}else if(($method === 'get' || $method === 'post') && $action === 'register'){
    register($method, $action);
}/*else if($method === 'post' && $action === 'register'){
    register($method, $action);
}*/

function login($method, $action) {
    if($method === 'get' && ($action === 'login' || $action === '')) {
       /* include_once("../../views/layouts/header.php");*/
        include_once("../../views/users/login-view.php");
        /*include_once("../../views/layouts/footer.php");*/
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
        $token = (rand(10,10000000000));
        $_SESSION['token'] = $token;
        include_once("../../views/users/registration-view.php");
        exit();
    }else if($method === 'post' && $action === 'register') {
               // Logic for registration

        echo "<pre>"; print_r($_REQUEST);die;
    }
}



?>