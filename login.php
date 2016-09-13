<?php session_start();

/********************************
	 DATABASE & FUNCTIONS
********************************/
require('config/config.php');
require('model/functions.fn.php');


/********************************
			PROCESS
********************************/

if(isset($_POST['email']) && isset($_POST['password'])){
	if(!empty($_POST['email']) && !empty($_POST['password'])){

		// TODO

		// Force user connection to access dashboard
		$result = userConnection($db,$_POST['email'],$_POST['password']);
		if ( $result == true){
			header('Location: dashboard.php');
		}
		else {
			$error = 'Mauvais identifiants';
		}

	}else{
		$error = 'Champs requis !';
		//echo $error;

	}
}

/********************************
			VIEW
********************************/
include 'view/_header.php';
include 'view/login.php';
include 'view/_footer.php';
