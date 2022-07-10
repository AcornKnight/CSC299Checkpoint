<?php

// add parameters
function signup($data,$file){
	// add the body of the function based on the guidelines of signup.php
	// starts the session and creates a function to request a username and password combination from the user. If the users re-typed password matches
	// encrpyts it then writes it to the user file.
	if(isset($data['email'])){
		$data=implode(';',$data);
		$database=fopen($file,'w');
		fwrite($database,$data['email']);
		echo ('Account registered');
		session_start();
		$_SESSION['userID']=3;
	}
	if ((isset($_POST['email'])) {
		$username = mysqli_real_escape_string($_POST['name']);
		$email = mysqli_real_escape_string($_POST['email']);
		$password = mysqli_real_escape_string($_POST['password']);
		$password2 = mysqli_real_escape_string($_POST['password2']);

		if ($password != $password2) {
			echo 'The passwords do not match';
			header('location: index.php');
			session_destroy();
		}
		else {
			$password = md5($password);
		}

}

// add parameters
function signin($data, $file){
	// add the body of the function based on the guidelines of signin.php
	// This sign in function will take an email and password pair from the userID
	// compare it to the user file, and if they match log them in. Otherwise will return an error
	if(isset($data['email'])){
		$database=fopen($file,'r');
		while(!feof($database)){
			$line=explode(';',fgets($database));
			if($line[1]==$data['email']){
				fclose($database);
				$_SESSION = $_SESSION['logged'];
				header('location: ../../index.php');
				die('Congratulations, you are logged in!');
			}
		}
		die('The user does not exist.')
	}
}

function signout(){
	// add the body of the function based on the guidelines of signout.php
	// Simple function to end the session and sign the user out.
	session_start();
	unset($_SESSION['username']);
	header('location: index.php');
	session_destroy();
}

function is_logged(){
	// check if the user is logged
	//return true|false
	if(session_status() !== PHP_SESSION_ACTIVE) return False;
	else {
		return True;
		}
}
