<?php
	include("loginPageButton.php");
	$username = "";
	$productName = "";
	$productPrice = "";
	if (isset($_POST["cart"])) {
		$productName = $_POST["cart"];
		
		// echo $productName;
		// if (session_status() == PHP_SESSION_NONE) {
  //   		session_start();
		// }
		
		session_start();

		if (isset($_SESSION["username"])) {
			$productAvailable = false;
			$handle = fopen('productInfo.txt', "r");
			while(!feof($handle)) {
				$line = fgets($handle);
				$data = explode(",", $line);

				if($data[1]==$productName) {
					$productPrice = $data[2];
					//$fileContents = file_get_contents("productInfo.txt");
					//$fileContents = str_replace($data[3], $data[3]-1, "productInfo.txt");
					//file_put_contents("productInfo.txt", $fileContents);
					$productAvailable = true;
					break;
				}
			}
			fclose($handle);

			if ($productAvailable==true) {
				$username = $_SESSION["username"];
				$fileHandle = fopen('cartList.txt', "a");
				$result = fwrite ($fileHandle, "$username, $productName, $productPrice\n");
				fclose($fileHandle);
				echo "Added to Cart";
			}
			else {
				echo "This product is no more available.";
			}
		}
		else {
			echo "You have to login first to buy any product.";
		}
	}
?>