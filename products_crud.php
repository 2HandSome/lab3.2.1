<?php
	require_once "connection.php";

$title = $_POST['title'];
$text = $_POST['text'];
// Create
if (isset($_POST['submit'])) {
	global $mysqli;
	connectDB ();
	$res = $mysqli -> query("INSERT INTO `products`(title, text) VALUES('$title','$text')");
	closeDB ();
    header("Location:products.php");
    
}



?>