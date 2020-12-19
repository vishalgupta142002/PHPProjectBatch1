<?php

$method = @$_SERVER['REQUEST_METHOD'];
$action = @$_POST['submit']; // through form submit
$method = strtolower($method);
$action = strtolower($action);

?>