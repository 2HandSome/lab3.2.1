<?php
	require_once "connection.php";

$title = $_POST['title'];
$text = $_POST['text'];



print_r($title);
print_r($text);
$id = $_GET['id'];
print_r($id);
if (isset($_POST['edit_submit'])) {
	global $mysqli;
	connectDB ();
	$result = $mysqli -> query("UPDATED `products` SET `title`='$title', `text`='$text' WHERE `id`='$id'");

	closeDB ();
    header("Location:products.php");
    
}


?>