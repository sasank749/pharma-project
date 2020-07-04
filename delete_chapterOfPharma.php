<?php
	include('conn.php');

	$id = $_GET['chapters'];

	$sql="delete from chapter where chapterId='$id'";
	$conn->query($sql);
	echo 'delete';

	header('location:chapterOfPharma.php');
?>