<?php
@session_start();

function isLoggedIn() {
    $status = false;
    if(@$_SESSION['username']) {
        $status = true;
    }
    return $status;
}