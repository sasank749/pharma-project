<?php
ob_start();
// include header.php file
include ('header.php');
?>

<?php

    /*  include usercourses items if it is not empty */
        count($course->getData('usercourses')) ? include ('Template/_usercourses-template.php') :  include ('Template/notFound/_usercourses_notFound.php');
    /*  include usercourses items if it is not empty */

 
   

?>

<?php
// include footer.php file
include ('footer.php');
?>


