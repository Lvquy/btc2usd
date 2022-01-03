<?php

require('db.php');
if (isset($_POST["email"])) {
	$email = $_POST["email"];
	$top = $_POST["top"];
	$pur = $_POST["pur"];
	$bot = $_POST["bot"];
	$date = date("Y-m-d");

	$query = "INSERT into users (email,price_top,price_purchase,price_bot,create_date) VALUES
	 ('$email','$top','$pur','$bot','$date')";
	$result = mysqli_query($con,$query);
	echo 1;
}

?>