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
			$info = array("Username"=>$username, "Password"=>$password, "ConfirmPassword"=>$confirmPassword, "FullName"=>$fullName, "Email"=>$email, "Phone"=>$phone);

			setcookie("username", $username, time() + 86400);
			setcookie("password", $password, time() + 86400);
			setcookie("fullname", $fullName, time() + 86400);
			setcookie("email", $email, time() + 86400);
			setcookie("phone", $phone, time() + 86400);

			header("location:index.php");
		}
	}
?>