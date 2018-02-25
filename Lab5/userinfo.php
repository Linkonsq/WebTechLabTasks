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
						$handle = fopen('database.txt', "r");					
						while(!feof($handle)) {
							$line = fgets($handle);
							$data = explode(",", $line);

							if($data[3]==$_SESSION["fullname"]) {
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

							if($data[3]==$_SESSION["fullname"]) {
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

							if($data[3]==$_SESSION["fullname"]) {
								echo $data[5];
								break;
							}
						}
						fclose($handle);
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