<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Index</title>
	</head>

	<body>
		<form method="post" action="registerPageButton.php">
			<fieldset>	
				<legend><h2>Register</h2></legend>
				<div>
					<label>Username</label>
					<input type="text" name="username">
				</div><br>
				<div>
					<label>Password</label>
					<input type="password" name="password">
				</div><br>
				<div>
					<label>Confirm Password</label>
					<input type="password" name="conf_password">
				</div><br>
				<div>
					<label>Full Name</label>
					<input type="text" name="fullname">
				</div><br>
				<div>
					<label>Email</label>
					<input type="text" name="email">
				</div><br>
				<div>
					<label>Phone</label>
					<input type="text" name="phone">
				</div><br>
				<div>
					<button type="submit" name="submit">Submit</button>
					<button type="reset" name="reset">Reset</button>
				</div>
			</fieldset>
		</form>
	</body>
</html>