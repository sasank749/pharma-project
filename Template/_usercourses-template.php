<!-- Courses register section  -->
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['remove-course-submit'])){
            $deletedrecord = $Usercourses->deleteUsercourses($_POST['user_id'], $_POST['course_id']);
        }      
    }
	   include ('conn.php');
?>
<?php
   
?>

<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">MyCourses</h5>
		
        <!--  courses register type   -->
        <div class="row">
            <div class="col-sm-9">
			<p><?php echo $_SESSION['user']['userName']; ?></p>
                <?php
				//$sql = "SELECT * FROM COURSE where courseId IN (SELECT courseId FROM usercourses where userId = '1')";
				//$query=$conn->query($sql);		
				//while($row=$query->fetch_array()){
				//	 foreach ($query=$conn->query($sql) as $item) :
					 
					 foreach ($course->getUserCourses() as $row) :
                        $cart = $course->getCourse($row['courseId']);
                        $subTotal[] = array_map(function ($row){
							
							
               //     foreach ($product->getData('usercourses') as $item) :
                //        $cart = $product->getProduct($item['courseId']);
                 //       $subTotal[] = array_map(function ($item){
                ?>
                <!-- user courses  -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                       <a href="<?php printf('%s?courseId=%s', 'course.php',  $row['courseId']); ?>"> <img src="<?php echo $row['photo'] ?? "./assets/products/1.png" ?>" style="height: 120px;" alt="cart1" class="img-fluid"></a>
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $row['courseName'] ?? "Unknown"; ?></h5>
                        <small> <?php echo $row['description'] ?? "Brand"; ?></small>
						
                        
                        <!-- course qty -->
                        <div class="qty d-flex pt-2">
                            

                            <form method="post">
                                <input type="hidden" value="<?php echo $row['courseId'] ?? 0; ?>" name="course_id">
								                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['userId']; ?>">

                                <button type="submit" name="remove-course-submit" class="btn font-baloo text-danger px-3 border-right">Remove </button>
                            </form>

                           


                        </div>
                        <!-- !course qty -->

                    </div>

                    
                </div>
                <!-- !cart item -->
                <?php
                        }, $cart); // closing array_map function
                   endforeach;
				  
			//	}
                ?>
            </div>
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Total ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> courses)&nbsp; </h5>
                    </div>
                </div>
            </div>
			
        <!--  !courses cart types   -->
    </div>
</section>
<!-- !courses cart section  -->