<?php include("loginPageButton.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Welcome to Online Shopping</title>
	</head>
	<body>
		<h1 align="center">Online Shopping</h1><hr style="height: 2px; background-color: #333;"><br>
		<?php
			session_start();

			if ($_SESSION["username"] == true) {
				//echo "Welcome " . $_SESSION["username"] . "<br>";
				$handle = fopen('database.txt', "r");

				while(!feof($handle)) {
					$line = fgets($handle);
					$data = explode(",", $line);

					if($_SESSION["username"]==$data[0]) {
						echo "Welcome " . $data[3] . "<br>";
						break;
					}
				}
			}
			else {
				header("location:index.php");
			}
		?>
		<div align="center">
			<a href="profile.php">Profile</a>&emsp;
			<a href="logout.php">Logout</a>
		</div><br>
		<form method="post" action="addToCartButton.php" style="text-align: center;">
			<table border="1" style="float: left;">
				<tr>
					<th>Shop</th>
				</tr>
				<tr>
					<td>
						<select name="category" style="width: 150px;">
							<option value="">Category</option>
							<option value="Electronics">Electronics</option>
							<option value="Flowers">Flowers</option>
							<option value="Food">Food</option>
							<option value="Cloths">Cloths</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<select name="price" style="width: 150px;">
							<option value="">Price Range</option>
							<option value="999">$1-$999</option>
							<option value="9999">$1000-$9999</option>
							<option value="19999">$10000-$19999</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><button type='submit' name='find' style="width: 150px;">Find</button></td>
				</tr>
			</table>
			
			<table border="1" style="display: inline-block;">
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
					$productName = "";
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
							echo "<td>" . "<img src='uploads/$data[4]' alt='$data[1]' width='150' height='150'><br>" . $data[1] . "<br> $ " . $data[2] . "<br>Q: " . $data[3] . "<br><button type='submit' name='cart' value='$data[1]'>Add to Cart</button>" ."</td>\n";
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