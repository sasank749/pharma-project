<?php

// require MySQL Connection
require ('database/DBController.php');

// require Course Class
require ('database/Course.php');

// require Usercourses Class
require ('database/Usercourses.php');

// require chaptersStorage Class

require ('database/chaptersStorage.php');


// DBController object
$db = new DBController();

// course object
$course = new Course($db);
$course_shuffle = $course->getData();

// Usercourses object
$Usercourses = new Usercourses($db );

// chaptersStorage object

$chaptersStorage=new chaptersStorage($db);

