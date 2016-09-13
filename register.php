<?php session_start();
require('config/config.php');
require('model/functions.fn.php');



$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$user = isUsernameAvailable($db, $username);

if(isset($_POST) && !empty($_POST)){
		$available = isUsernameAvailable($db, $_GET['id'], $_POST['username'], $_SESSION['id']);
		if(available == true){
			header('Location: dashboard.php');
		}
		else{
			$error = 'Username indisponible.';
		}
	}

	$mail = isEmailAvailable($db, $email);

	if(isset($_POST) && !empty($_POST)){
			$available = isEmailAvailable($db, $_GET['id'], $_POST['email'], $_SESSION['id']);
			if(available == true){
				header('Location: dashboard.php');
			}
			else{
				$error = 'Email indisponible.';
			}
		}


include 'view/_header.php';
include 'view/register.php';
include 'view/_footer.php';
