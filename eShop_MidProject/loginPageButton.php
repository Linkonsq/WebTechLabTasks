<?php
	$username = "";
	$password = "";
	$adminUsername = "";
	$adminPassword = "";
	$errors = array();

	if (isset($_POST['login'])) {
		if (!empty($_POST['username'])) {
			if ($_POST['username']=="admin") {
				$adminUsername = $_POST['username'];
			}
			else {
				$username = $_POST['username'];
			}
		}
		elseif (empty($_POST['username'])) {
			array_push($errors, "Username is required");
		}

		if (!empty($_POST['password'])) {
			if ($_POST['password']=="admin") {
				$adminPassword = $_POST['password'];
			}
			else {
				$password = $_POST['password'];
			}
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
			if (($adminUsername=="admin") && ($adminPassword=="admin")) {
				session_start();
				$_SESSION["admin"] = $adminUsername;
				header("location:adminPage.php");
			}
			else {
				$handle = fopen('database.txt', "r");

				$user_found = false;

				while(!feof($handle)) {
					$line = fgets($handle);
					$data = explode(",", $line);

					if(($username==$data[0]) && ($password==$data[1])) {
						session_start();
						$_SESSION["username"] = $data[0];
						header("location:customerPage.php");
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
	}
?>