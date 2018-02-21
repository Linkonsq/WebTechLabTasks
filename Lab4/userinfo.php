<?php include("loginPageButton.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>User Info</title>
	</head>

	<body>
		<fieldset>
			<legend><h2>User Info</h2></legend>

			<div>
				<?php
					session_start();

					if ($_SESSION["fullname"] == true) {
						echo "<table border='1px'>";
						echo "<tr>";
						echo "<th>Full Name</td>";		
						echo "<th>Email</td>";		
						echo "<th>Phone</td>";		
						echo "</tr>";
						echo "<tr>";
						echo "<td>";
						if(isset($_COOKIE["fullname"])) {
							echo $_COOKIE["fullname"];
						}
						echo "</td>";
						echo "<td>";
						if(isset($_COOKIE["email"])) {
							echo $_COOKIE["email"];
						}
						echo "</td>";
						echo "<td>";
						if(isset($_COOKIE["phone"])) {
							echo $_COOKIE["phone"];
						}
						echo "</td>";
						echo "</tr>";
						echo "</table><br>";
					}
					else {
						header("location:index.php");
					}
				?>
				<a href="home.php">Home</a>
				<a href="logout.php">Logout</a>
			</div>
		</fieldset>
	</body>
</html>