<?php

	//for loops
	for ($i=0; $i < 10; $i++)
	{ 
		echo "Linkon Siddique<br>";
	}

	$x = 10;
	$y = 20;

	//if else statement
	if ($x>$y)
	{
		echo "X is greater than Y<br>";
	}
	else
	{
		echo "Y is greater than X<br>";
	}

	echo "Summation of X and Y is : " . $x + $y . "<br>";

	//Switch Case
	$name = "Linkon";

	switch ($name)
	{
		case 'Linkon':
			echo "I am Linkon Siddique<br>";
			break;
		
		case 'Musa':
			echo "I am Musa Khan<br>";
			break;

		default:
			echo "No name found<br>";
			break;
	}

	//while loop
	$x = 0;

	while ($x < 10)
	{
		echo "Linkon<br>";
		$x++;
	}

	//array declaration
	$cars = array("Musa", "Rufi", "Adnan", "Linkon");

	//foreach loop
	foreach ($cars as $name)
	{
		echo $name . "<br>";
	}

	$age = array("Linkon"=>"22", "Rufi"=>"24", "Adnan"=>"25");

	for ($i=5; $i >0 ; $i--)
	{ 
		for ($j=$i; $j >0 ; $j--)
		{ 
			echo "* ";
		}
		echo "<br>";
	}	
?>