<?php include("loginPageButton.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Welcome Admin</title>
	</head>
	<body>
		<h1 align="center">Online Shopping</h1><hr style="height: 2px; background-color: #333;">
		<div align="center">
			<a href="logout.php">Logout</a>
		</div>
		<?php
			session_start();

			if ($_SESSION["admin"] == true) {
				echo "Welcome " . $_SESSION["admin"] . "<br><br><br>";
			}
			else {
				header("location:index.php");
			}
		?>
		
		<label><b><u>All Products:</u></b></label><br><br>
		<form method="post" action="addProductButton.php" style="text-align: center;">
			<button type="submit" name="add" style="float: left;">Add Product</button><br><br>
			<!-- <button type="submit" name="remove">Remove Product</button><br><br> -->
			<table border="1" style="float: left;">
				<?php
					$file="ProductInfo.txt";
					$linecount = 0;
					$handle = fopen($file, "r");
					while(!feof($handle)){
						$line = fgets($handle);
						$linecount++;
					}
					fclose($handle);
					//echo $linecount;

					$finalLineCount = $linecount - 1;
					$i = 0;
					$file="ProductInfo.txt";
					$handle = fopen($file, "r");

					while (!feof($handle)) {
						$line = fgets($handle);
						$data = explode(",", $line);
						while ($i < $finalLineCount) {
							if ($i%5==0) {
								echo "<tr>\n";
							}
							echo "<td>" . "<img src='uploads/$data[4]' alt='$data[1]' width='150' height='150'><br>" . $data[1] . "<br> $ " . $data[2] . "<br>Q: " . $data[3] . "</td>\n";
							$i++;
							if ($i%5==0) {
								echo "<tr>\n";
							}
							break;
						}
					}

					fclose($handle);
				?>
			</table>
		</form>
	</body>
</html>