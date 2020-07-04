<?php
	include('conn.php');

	$id=$_GET['chapter'];

	$pname=$_POST['pname'];
	$course=$_POST['course'];
	$description=$_POST['description'];
	$sql="select * from chapter where chapterId='$id'";
	$query=$conn->query($sql);
	$row=$query->fetch_array();
	
$fileinfo1=PATHINFO($_FILES["video"]["name"]);

	if (empty($fileinfo1['filename'])){
		$location1 = $row['video'];
	}
	else{
	$newFilename=$fileinfo1['filename'] ."_". time() . "." . $fileinfo1['extension'];
	move_uploaded_file($_FILES["video"]["tmp_name"],"upload/" . $newFilename);
	$location1="upload/" . $newFilename;
	}
	$fileinfo2=PATHINFO($_FILES["pdf"]["name"]);

	if (empty($fileinfo2['filename'])){
		$location2 = $row['pdf'];
	}
	else{
	$newFilename=$fileinfo2['filename'] ."_". time() . "." . $fileinfo2['extension'];
	move_uploaded_file($_FILES["pdf"]["tmp_name"],"upload/" . $newFilename);
	$location2="upload/" . $newFilename;
	}
	

	

	$sql="update chapter set chapterName='$pname',courseId='$course',chapterdescription='$description',video='$location1',pdf='$location2' where chapterId='$id'";
	$conn->query($sql);

	header('location:chapterOfPharma.php');
	?>