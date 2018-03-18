<?php
	include ("loginPageButton.php");
	$username = "";
	$password = "";
	$confirmPassword = "";
	$fullName = "";
	$email = "";
	$phone = "";
	$errors = array();

	if (isset($_POST['submit'])) {
		if (!empty($_POST['username'])) {
			$userFound = false;
			$handle = fopen('database.txt', "r");					
			while(!feof($handle)) {
				$line = fgets($handle);
				$data = explode(",", $line);

				if($data[0]== $_POST['username']) {
					array_push($errors, "This username is already taken.");
					$userFound = true;
				}
				break;
			}
			fclose($handle);
			
			if($userFound==false) {
				if ($_POST['username']=="admin") {
					array_push($errors, "This username can't be taken.");	
				}
				else {
					$username = $_POST['username'];
				}
			}
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

		if (!empty($_POST['conf_password'])) {
			$confirmPassword = $_POST['conf_password'];
		}
		elseif (empty($_POST['conf_password'])) {
			array_push($errors, "Confirm password is required");
		}

		if (!empty($_POST['fullname'])) {
			$fullName = $_POST['fullname'];
		}
		elseif (empty($_POST['fullname'])) {
			array_push($errors, "Full Name is required");
		}

		if (!empty($_POST['email'])) {
			$email = $_POST['email'];
		}
		elseif (empty($_POST['email'])) {
			array_push($errors, "Email is required");
		}

		if (!empty($_POST['phone'])) {
			if (!is_numeric($_POST['phone'])) {
				array_push($errors, "Enter a valid phone number.");	
			}
			else if (strlen($_POST['phone'])!=11 ) {
				array_push($errors, "Enter a valid phone number.");	
			}
			else{
				$phone = $_POST['phone'];
			}
		}
		elseif (empty($_POST['phone'])) {
			array_push($errors, "Phone is required");
		}

		if((!empty($_POST['password']) && !empty($_POST['conf_password'])) && ($password != $confirmPassword)) {
			array_push($errors, "Password doesn't match");
		}

		// if (count($errors) > 0) {
		// 	foreach ($errors as $error) {
		// 		echo $error . "<br>";
		// 	}
		// }
		// elseif (count($errors) == 0) {
		// 	$fileHandle = fopen('database.txt', "a");

		// 	$result = fwrite ($fileHandle, "$username, $password, $confirmPassword, $fullName, $email, $phone\n");

		// 	fclose($fileHandle);

		// 	header("location:index.php");
		// }
	}

	if (count($errors) > 0) {
		foreach ($errors as $error) {
			echo $error . "<br>";
		}
	}
	elseif (count($errors) == 0) {
		$fileHandle = fopen('database.txt', "a");
		$result = fwrite ($fileHandle, "$username, $password, $confirmPassword, $fullName, $email, $phone\n");

		fclose($fileHandle);

		header("location:index.php");
	}
?>