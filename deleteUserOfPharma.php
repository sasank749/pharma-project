<?php
	include('conn.php');

	$id = $_GET['users'];

	$sql="delete from users where userId='$id'";
	$conn->query($sql);
	echo 'delete';

	header('location:RegisteredUsersOfPharma.php');
?>