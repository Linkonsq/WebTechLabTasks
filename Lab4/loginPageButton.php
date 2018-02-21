<?php
	$username = "";
	$password = "";
	$errors = array();
	//$info = array();

	if (isset($_POST['register'])) {
		header("location:register.php");
	}
	elseif (isset($_POST['login'])) {

		if (!empty($_POST['username'])) {
			$username = $_POST['username'];
		}
		elseif (empty($_POST['username'])) {
			array_push($errors, "Username is required");
		}

		if (!empty($_POST['password'])) {
			$password = $_POST['password'];
		}
		elseif (empty($_POST['password'])) {
			array_push($errors, "Password is required");
		}

		if (count($errors) > 0) {
			foreach ($errors as $error) {
				echo $error . "<br>";
			}
		}
		elseif (count($errors) == 0) {
			if(isset($_COOKIE["username"]) && isset($_COOKIE["username"])) {
				if (($username == $_COOKIE["username"]) && ($password == $_COOKIE["password"])) {
					session_start();
					if(isset($_COOKIE["fullname"])) {
						$_SESSION["fullname"] = $_COOKIE["fullname"];
					}
					header("location:home.php");
				}
				else {
					echo "Invalid Username and Password";
				}
			}
			else {
				echo "You are not registerd yet";
			}
		}		
	}
?>