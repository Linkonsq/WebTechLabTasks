<?php include("loginPageButton.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>User Info</title>
	</head>

	<body>
		<h1 align="center">Online Shopping</h1><hr style="height: 2px; background-color: #333;">
		<fieldset>
			<legend><h2>User Info</h2></legend>

			<div>
				<?php
					session_start();

					if ($_SESSION["username"] == true) {						
						echo "<table border='1'>";
						echo "<tr>";
						echo "<th>Username</th>";		
						echo "<th>Password</th>";		
						echo "<th>Full Name</th>";		
						echo "<th>Email</th>";		
						echo "<th>Phone</th>";		
						echo "</tr>";
						echo "<tr>";
						echo "<td>";	
						$handle = fopen('database.txt', "r");					
						while(!feof($handle)) {
							$line = fgets($handle);
							$data = explode(",", $line);

							if($data[0]==$_SESSION["username"]) {
								echo $data[0];
								break;
							}
						}
						fclose($handle);
						echo "</td>";
						echo "<td>";
						$handle = fopen('database.txt', "r");
						while(!feof($handle)) {
							$line = fgets($handle);
							$data = explode(",", $line);

							if($data[0]==$_SESSION["username"]) {
								echo $data[1];
								break;
							}
						}
						fclose($handle);
						echo "</td>";
						echo "<td>";
						$handle = fopen('database.txt', "r");
						while(!feof($handle)) {
							$line = fgets($handle);
							$data = explode(",", $line);

							if($data[0]==$_SESSION["username"]) {
								echo $data[3];
								break;
							}
						}
						fclose($handle);
						echo "</td>";
						echo "<td>";
						$handle = fopen('database.txt', "r");
						while(!feof($handle)) {
							$line = fgets($handle);
							$data = explode(",", $line);

							if($data[0]==$_SESSION["username"]) {
								echo $data[4];
								break;
							}
						}
						fclose($handle);
						echo "</td>";
						echo "<td>";
						$handle = fopen('database.txt', "r");
						while(!feof($handle)) {
							$line = fgets($handle);
							$data = explode(",", $line);

							if($data[0]==$_SESSION["username"]) {
								echo $data[5];
								break;
							}
						}
						fclose($handle);
						echo "</td>";
						echo "</tr>";
						echo "</table><br>";
						echo "<table border='1'>";
						echo "<tr>";
						echo "<th colspan='2'>Cart List</th>";
						echo "</tr>";
						echo "<tr>";
						echo "<th>Product Name</th>";
						echo "<th>Product Price</th>";
						echo "</tr>";
						$i = 0;
						$handle = fopen('cartList.txt', "r");
						while(!feof($handle)) {
							$line = fgets($handle);
							$data = explode(",", $line);

							if($data[0]==$_SESSION["username"]) {
								echo "<tr>";
								echo "<td>$data[1]</td>";
								echo "<td>$data[2]</td>";
								echo "</tr>";
							}
						}
						fclose($handle);
						echo "</table><br>";
					}
					else {
						header("location:index.php");
					}
				?>
				<a href="customerPage.php">Home</a>
				<a href="logout.php">Logout</a>
			</div>
		</fieldset>
	</body>
</html>