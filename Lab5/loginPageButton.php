<?php
	$username = "";
	$password = "";
	$errors = array();

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
			$handle = fopen('database.txt', "r");

			$user_found = false;

			while(!feof($handle)) {
				$line = fgets($handle);
				$data = explode(",", $line);

				if(($username==$data[0]) && ($password==$data[1])) {
					session_start();
					$_SESSION["fullname"] = $data[3];
					header("location:home.php");
					$user_found = true;
					break;
				}
			}

			if($user_found==false) {
				echo "Invalid Username and Password";
			}

			fclose($handle);
		}		
	}
?>