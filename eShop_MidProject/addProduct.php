<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Add Product</title>
	</head>
	
	<body>
		<?php
			session_start();

			if ($_SESSION["admin"] == false) {
				header("location:index.php");
			}
		?>
		
		<h1 align="center">Online Shopping</h1><hr style="height: 2px; background-color: #333;">
		<form method="post" action="addProductInfoButton.php" enctype="multipart/form-data">
			<fieldset>	
				<legend><h2>Product Information</h2></legend>
				<div>
					<label>Product Category</label>
					<input type="text" name="pcategory"><br><br>
					<label>Product Name</label>
					<input type="text" name="pname"><br><br>
					<label>Product Price</label>
					<input type="text" name="pprice"><br><br>
					<label>Product Quantity</label>
					<input type="text" name="pquantity"><br><br>
					<label>Product Image</label>
					<input type="file" name="fileToUpload" id="fileToUpload"><br><br>
					<button type="submit" name="submit">Submit</button>
					<button type="reset" name="reset">Reset</button>
					<!-- <button type="submit" name="home">Home</button>
					<button type="submit" name="logout">Logout</button> -->
					<a href="adminPage.php">Home</a>
					<a href="logout.php">Logout</a>
				</div>
			</fieldset>
		</form>
	</body>
</html>