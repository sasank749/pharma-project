
<?php
    $coursetype = array_map(function ($pro){ return $pro['courseType']; }, $course_shuffle);
    $unique = array_unique($coursetype);
    sort($unique);
    shuffle($course_shuffle);

// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['course_wise_submit'])){
        // call method addToUsercourses
        $Usercourses->addToUsercourses($_POST['user_id'], $_POST['course_Id']);
    }
}

$in_Usercourses = $Usercourses->getUsercoursesId($course->getUserCourses());

?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['course_wise_remove'])){
			        // call method addToUsercourses

            $deletedrecord = $Usercourses->deleteUsercourses($_POST['user_id'], $_POST['course_Id']);
        }      
    }
?>
		<link rel="stylesheet" type="text/css" href="Template/PharmaCourses.css">

<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20" style="text-align: center; margin-top: 20px;">Pharma courses</h4>
		<div>
		<div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">All Courses</button>
            <?php
                array_map(function ($coursetype){
                    printf('<button class="btn" data-filter=".%s">%s</button>', $coursetype, $coursetype);
                }, $unique);
            ?>
        </div>
        <div class="grid">
            <?php array_map(function ($row) use($in_Usercourses){ ?>
            <div class="grid-item border <?php echo $row['courseType'] ?? "Course" ; ?>" style="border: 0 !important;">
                <div class="item py-2" style="width: 200px;">

                    <div class="product font-rale">

                        <a href="<?php printf('%s?courseId=%s', 'course.php',  $row['courseId']); ?>"><img src="<?php echo $row['photo'] ?? "./assets/products/13.png"; ?>" style="height: 200px; width: 200px;" alt="course" class="img-fluid"></a>
                        <div class="text-center">
                           <h5 style="margin : 18px 0 18px 0;"> 
						   <a href="<?php printf('%s?courseId=%s', 'course.php',  $row['courseId']); ?>" class = "course-description"><?php echo $row['courseName'] ?? "NotYetMentioned"; ?></a>
                            </h5>
                            <form method="post">
                                <input type="hidden" name="course_Id" value="<?php echo $row['courseId'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['userId']; ?>">

                                <?php
                                if (in_array($row['courseId'], $in_Usercourses ?? [])){
                                    echo '<button type="submit" name="course_wise_remove" class="btn btn-danger font-size-12">Remove</button>';
                                }else{
                                    echo '<button type="submit" name="course_wise_submit" class="btn btn-warning font-size-12">Enroll</button>';
                                }
                                ?>
								
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <?php }, $course_shuffle) ?>
        </div>
    </div>
</section>

