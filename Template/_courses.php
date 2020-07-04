<!--   course  -->
<?php
    $course_id = $_GET['courseId'] ?? 1;
    foreach ($course->getData() as $courserow) :
        if ($courserow['courseId'] == $course_id) :
?>
<?php
   $course_id = $_GET['courseId'] ?? 1;
    // include header.php file
    include ('conn.php');
?>

<?php 
     if($_SERVER['REQUEST_METHOD'] == "POST"){
      if (isset($_POST['chapter_wise_submit'])){
        // call method addToChaptersStorage
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
		<link rel="stylesheet" type="text/css" href="Template/_courses.css">

	

<section id="product" class="py-3" >
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo $courserow['photo'] ?? "./assets/products/1.png" ?>" alt="course" class="img-fluid">
                
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20"><?php echo $courserow['courseName'] ?? "Unknown"; ?></h5>
                <small><?php echo $courserow['courseType'] ?? "notYetMentioned"; ?></small>
                
                <hr class="m-0">

                <!---    course description       -->
                <table class="my-3">
                    <td>Description:</td>
                    <tr class="font-rale font-size-14">
                        
                        <td class="font-size-20 text-danger"><span><?php echo $courserow['description'] ?? "Unknown"; ?></span><small class="text-dark font-size-12"></small></td>
                    </tr>
                    
                </table>
            </div>
        </div>
		<!--- <a href="<?php printf('%s?courseId=%s', 'chapters.php',  $item['courseId']); ?>">Learn More</a>--> 
		<div class="container" onload="myFunction()">
          <h3 class="page-header text-center" >Course Syllbus</h3>
               <?php 
				$sql="select *from chapter where courseId = {$course_id}";
				$query=$conn->query($sql);
				while($chapterrow=$query->fetch_array()){
					?>
					<div class= "chapterdata">
					<div>
			            <form method="post" id="form">
                            <input type="hidden" name="chapter_id" value="<?php echo $chapterrow['chapterId'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['userId']; ?>">

							
                            <?php
                            if (in_array($chapterrow['chapterId'], $chaptersStorage->getChaptersStorageId($course->getChaptersStorage()) ?? [])){
                           
					// echo '<button class ="after-check" type="submit" name="chapter_wise_remove" ><img class ="after-check-image" src="upload/after-check.png" /></button>';
                           
			        //echo '<button class ="after-check" style="padding: 0; border: 0;"><input type="checkbox" name="chapter_wise_remove" id ="completed-course" class ="after-check1" checked onclick="this.form.submit();" /></button>';
			//echo '<button class ="after-check" type="submit" name="chapter_wise_remove" ><input type="checkbox" checked/></button>';
   	echo '<button type="submit" name="chapter_wise_remove" style="padding: 0; border: 0; height:0;"><img src="upload/check-box-checked.png" style="margin-top:24px" /></button>';

						   }else{
                               
							   //echo '<button class ="before-check" type="submit" name="chapter_wise_submit" ><img class="before-check-image" src="upload/before-check.png" /></button>';
								
						//	echo '<button class ="before-check" style="padding: 0; border: 0;"><input type="checkbox" name="chapter_wise_submit" class ="before-check1" onclick="this.form.submit();" /></button>';
					//echo '<button class ="before-check" type="submit" name="chapter_wise_submit" ><input type="checkbox"/></button>';
		echo '<button type="submit" name="chapter_wise_submit" style="padding: 0; border: 0; height:0;"><input type="checkbox" style="margin-top:24px;" name="chapter_wise_submit" onclick="this.form.submit()" /></button>';

			
					}
                            ?>

                        </form>
						</div>
						
						<div class="chapterdetails">

							<button class="accordion "><?php echo $chapterrow['chapterName']; ?></button>
						  
						   <!--   <img id = "before-check" src="upload/before-check.png" alt="before-check" onclick="beforeClick()"/>
							  <img id = "after-check" src="upload/after-check.png" alt="after-check" onclick="afterClick()"/>
						   -->
						
                         <div class="panel">
						 	<h6 style="margin-top:20px">Description:</h6>

                              <p style="color:brown;"><?php echo $chapterrow['chapterdescription']; ?></p>
							  	<h6>Click Below link For The video</h6>

							  <p><a href="<?php if(empty($chapterrow['video'])){echo "upload/video.png";} else{echo $chapterrow['video'];} ?>">Watch Video</a></td>
</p>
                           <h6>Click Below link For The Pdf</h6>

							  <p><a href="<?php if(empty($chapterrow['pdf'])){echo "upload/viewpdf.png";} else{echo $chapterrow['pdf'];} ?>">View Pdf</a></td>
</p>
                          </div>
						  </div>
						  </div>
					<?php
				}
			?>
</div>


    </div>
</section>

<script type="text/javascript"> 

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");

    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}

   
    
	
    </script>


<!--   !course  -->
<?php
        endif;
        endforeach;
?>