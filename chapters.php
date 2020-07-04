<?php
   
    // include header.php file
    include ('header.php');
?>
<?php
   $course_id = $_GET['courseId'] ?? 1;
    // include header.php file
    include ('conn.php');
?>

<?php 
     if($_SERVER['REQUEST_METHOD'] == "POST"){
      if (isset($_POST['chapter_wise_submit'])){
        // call method addToCart
        $chaptersStorage->addToChaptersStorage($_POST['user_id'], $_POST['chapter_id']);
    }
}
				
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['chapter_wise_remove'])){
            $deletedrecord = $chaptersStorage->deleteChaptersStorage($_POST['chapter_id']);
        }      
    }
?>
			

<link rel="stylesheet" type="text/css" href="courses.css">

<div class="container">
          <h3 class="page-header text-center" >Course Syllbus</h3>
               <?php 
				$sql="select *from chapter where courseId = {$course_id}";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
			            <form method="post">
                            <input type="hidden" name="chapter_id" value="<?php echo $row['chapterId'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['userId']; ?>">

							
                            <?php
                            if (in_array($row['chapterId'], $chaptersStorage->getChaptersStorageId($course->getChaptersStorage()) ?? [])){
                           
							//	echo '<button type="submit" name="chapter_wise_remove" style="padding: 0; border: 0;"><img src="upload/after-check.png" /></button>';
                           
						   echo '<button type="submit" name="chapter_wise_remove" style="padding: 0; border: 0;"><img src="upload/check-box-checked.png" /></button>';
						   
						   
						   }else{
                             //  echo '<button type="submit" name="chapter_wise_submit" style="padding: 0; border: 0;"><img src="upload/before-check.png" /></button>';
								
								echo '<button type="submit" name="chapter_wise_submit" style="padding: 0; border: 0;"><input type="checkbox" name="chapter_wise_submit" onclick="this.form.submit()" /></button>';
								
                            }
                            ?>

                        </form>

							<button class="accordion"><?php echo $row['chapterName']; ?></button>
						  
						   <!--   <img id = "before-check" src="upload/before-check.png" alt="before-check" onclick="beforeClick()"/>
							  <img id = "after-check" src="upload/after-check.png" alt="after-check" onclick="afterClick()"/>
						   -->
						
                         <div class="panel">
						 	<h6>Description:</h6>

                              <p style="color:brown;"><?php echo $row['chapterdescription']; ?></p>
							  	<h6>Click Down For The video</h6>

							  <p><a href="<?php if(empty($row['video'])){echo "upload/gcp.png";} else{echo $row['video'];} ?>"><img src="<?php if(empty($row['photo'])){echo "upload/gcp.png";} else{echo $row['video'];} ?>" height="30px" width="30px"></a></td>
</p>
<h6>Click Down For The Pdf</h6>

							  <p><a href="<?php if(empty($row['pdf'])){echo "upload/gcp.png";} else{echo $row['pdf'];} ?>"><img src="<?php if(empty($row['photo'])){echo "upload/gcp.png";} else{echo $row['pdf'];} ?>" height="30px" width="30px"></a></td>
</p>

                          </div>
						  
						  
					<?php
				}
			?>
</div>

<script type="text/javascript"> 
          var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}

function  beforeClick(){
	document.getElementById("before-check").style.display = "none";
	document.getElementById("after-check").style.display = "inline";
		
}
function afterClick(){
	document.getElementById("before-check").style.display = "inline";
	document.getElementById("after-check").style.display = "none";
	
	
}

</script>