<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();

if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) &&
	!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {




		if(isset($_POST) && !empty($_POST)){
				$available = isUsernameAvailable($db, $_POST['username']);
				if($available == false)
				{
					$_SESSION['message'] = 'Erreur : Username invalide';

					header('Location: register.php');
				}
			}

			if(isset($_POST) && !empty($_POST && $available)){
					$availables = isEmailAvailable($db, $_POST['email']);
					if($availables == false)
					{
						$_SESSION['message'] = 'Erreur : Email invalide';

						header('Location: register.php');
					}
				}

			}else{
				$_SESSION['message'] = 'Erreur : Formulaire incomplet';
				header('Location: register.php');
			}

				if(isset($_POST) && !empty($_POST)){
					if ($available && $availables){
						$inscrit = userRegistration($db, $_POST['username'],  $_POST['email'],  $_POST['password']);
							header('Location: dashboard.php');
					}
				}
