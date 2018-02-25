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
			$phone = $_POST['phone'];
		}
		elseif (empty($_POST['phone'])) {
			array_push($errors, "Phone is required");
		}

		if((!empty($_POST['password']) && !empty($_POST['conf_password'])) && ($password != $confirmPassword)) {
			array_push($errors, "Password doesn't match");
		}

		if (count($errors) > 0) {
			foreach ($errors as $error) {
				echo $error . "<br>";
			}
		}
		elseif (count($errors) == 0) {
			$fileHandle = fopen('database.txt', "a");

			$result = fwrite ($fileHandle, "$username, $password, $confirmPassword, $fullName, $email, $phone\n");

			/*if ($result) {
     			echo "Data written successfully.<br>";
			}
	 		else {
     			echo "Data write failed.<br>";
			}*/

			fclose($fileHandle);

			header("location:index.php");
		}
	}
?>