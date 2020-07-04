<?php

	include('conn.php');
	$pname=$_POST['pname'];
	$course=$_POST['course'];
    $description=$_POST['description'];
    $fileinfo1=PATHINFO($_FILES["video"]["name"]);

	if(empty($fileinfo1['filename'])){
		$location="";
	}
	else{
	$newFilename=$fileinfo1['filename'] ."_". time() . "." . $fileinfo1['extension'];
	move_uploaded_file($_FILES["video"]["tmp_name"],"upload/" . $newFilename);
	$location1="upload/" . $newFilename;
	}
	$fileinfo2=PATHINFO($_FILES["pdf"]["name"]);

	if(empty($fileinfo2['filename'])){
		$location="";
	}
	else{
	$newFilename=$fileinfo2['filename'] ."_". time() . "." . $fileinfo2['extension'];
	move_uploaded_file($_FILES["pdf"]["tmp_name"],"upload/" . $newFilename);
	$location2="upload/" . $newFilename;
	}

	
	$sql="insert into chapter (chapterName,courseId,chapterdescription,video,pdf) values ('$pname', '$course','$description','$location1','$location2')";
	$conn->query($sql);

	header('location:chapterOfPharma.php');

?>
