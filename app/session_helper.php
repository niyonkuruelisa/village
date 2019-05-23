<?php
session_start();

function isLoggedIn(){

    if(isset($_SESSION['userEmail'])){
    	return $credentials = array($_SESSION['userEmail'], $_SESSION['user_password'], $_SESSION['type']);

    } else {
    	return null;

    }
}

function lockMe(){
	if($credentials = isLoggedIn()){
		$_SESSION['user_password'] = false;
	}
}