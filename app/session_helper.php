<?php
	session_start();

	function isLoggedIn(){

	    if(isset($_SESSION['userEmail'])){
	    	return $credentials = array($_SESSION['userEmail'], $_SESSION['user_password'], $_SESSION['type'], 'userId'=>$_SESSION['userId'], 'userPassword' => $_SESSION['user_password'], 'userType' => $_SESSION['userType']);
	    } else {
	    	return null;

	    }
	}

	function lockMe(){
		if($credentials = isLoggedIn()){
			$_SESSION['user_password'] = false;
		}
}