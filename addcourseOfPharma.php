<?php
	include('conn.php');

	$cname=$_POST['cname'];
	$cnname=$_POST['cnname'];
	$description=$_POST['description'];
	
$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if(empty($fileinfo['filename'])){
		$location="";
	}
	else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;
	}
	



	$sql="insert into course (courseType,courseName,description,photo) values ('$cname','$cnname','$description','$location')";
	$conn->query($sql);

	header('location:courseOfPharma.php');

?>