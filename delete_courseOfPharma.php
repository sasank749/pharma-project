<?php
	include('conn.php');

	$id = $_GET['course'];

	$sql="delete from course where courseId='$id'";
	$conn->query($sql);

	header('location:courseOfPharma.php');
?>