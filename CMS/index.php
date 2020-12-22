<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("app/helpers/users-utils.php");
$query_string = $_SERVER['QUERY_STRING']; // module=users&action=login

//print_r($_GET);die;
//$query_arr = explode("&", $query_string);
//$arg1_string = @$query_arr[0]; // module=users
//$arg2_string = @$query_arr[1]; // action=login
//$arg1_arr = explode("=", $arg1_string);
// list($module_key, $module_value) = explode("=", $arg1_string); // module=users
// echo "$module_key, $module_value";die;
//$arg2_arr = explode("=", $arg2_string);

//explode(); // String to Array
//imlode(); // Array to String

$module = @$_GET['module'];
$ctrl = ucfirst(strtolower($module));
$action = @$_GET['action'];
$method = strtolower($_SERVER['REQUEST_METHOD']);

if(empty($module) || empty($action)) {
    include_once("app/views/layouts/header.php");
    include_once("app/views/layouts/footer.php");
}else{
    require_once("app/controllers/$module/$ctrl.php");
    $action($method, $action);
}

?>

