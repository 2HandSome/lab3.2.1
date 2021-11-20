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


if (isset($_POST['delete_submit'])) {
	global $mysqli;
	connectDB ();
	$sql = "DELETE FROM users WHERE id=?";
	$query = $pdo->prepare($sql);
	$query->execute([$get_id]);
		closeDB ();
	header('Location: '. $_SERVER['HTTP_REFERER']);
}
?>