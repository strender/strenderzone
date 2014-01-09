<?php 
	session_start();

	if(!isset($_SESSION['user_key']){
		if (isset($_COOKIE['user_key']) && isset($_COOKIE['user_name'])) {
			$_SESSION['user_key'] = $_COOKIE['user_key'];
			$_SESSION['user_name'] = $_COOKIE['user_name']
		}
	}
 ?>