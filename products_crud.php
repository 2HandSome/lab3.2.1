<?php
	require_once "connection.php";

$title = $_POST['title'];
$text = $_POST['text'];
$id = $_GET['id'];
// Create
if (isset($_POST['submit'])) {
	global $mysqli;
	connectDB ();
	$res = $mysqli -> query("INSERT INTO `products`(title, text) VALUES('$title','$text')");
	closeDB ();
    header('Location: '. $_SERVER['HTTP_REFERER']);
    
}
if (isset($_POST['edit_submit'])) {
	global $mysqli;
	connectDB ();
	$res = $mysqli -> query("UPDATE `products` SET `title`='$title', `text`='$text' WHERE `id`='$id'");
	closeDB ();
    header('Location: '. $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['delete_submit'])) {
	global $mysqli;
	connectDB ();
	$res = $mysqli -> query("DELETE FROM `products` WHERE `id`='$id'");
	closeDB ();
    header('Location: '. $_SERVER['HTTP_REFERER']);
}

?>