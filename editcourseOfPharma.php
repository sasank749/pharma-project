<?php
	include('conn.php');

	$id=$_GET['course'];

	$cname=$_POST['cname'];
	$cnname=$_POST['cnname'];
	$description=$_POST['description'];
	$sql="select * from course where courseId='$id'";
	$query=$conn->query($sql);
	$row=$query->fetch_array();
	
$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if (empty($fileinfo['filename'])){
		$location = $row['photo'];
	}
	else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;
	}
	

	$sql="update course set photo='$location',courseType='$cname',courseName='$cnname',description='$description' where courseId='$id'";
	$conn->query($sql);

	header('location:courseOfPharma.php');
?>