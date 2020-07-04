<?php

// Use to fetch course data
class Course
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }


    // fetch course data using getData Method
    public function getData($table = 'course'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        // fetch course data one by one
        while ($course = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $course;
        }

        return $resultArray;
    }

    // get course using courseid
    public function getCourse($course_Id = null, $table= 'course'){
        if (isset($course_Id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE courseId={$course_Id}");

            $resultArray = array();

            // fetch coursedata data one by one
            while ($course = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $course;
            }

            return $resultArray;
        }
    }
	
	 // get user courses using userid
    public function getUserCourses($course_Id = null, $table= 'course'){
			$userId = $_SESSION['user']['userId'];
        $result = $this->db->con->query("SELECT * FROM {$table} where courseId IN (SELECT courseId FROM usercourses where userId = '{$userId}') ");

        $resultArray = array();

        // fetch UserCourses data one by one
        while ($course = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $course;
        }

        return $resultArray;
    }
	public function getChaptersStorage($course_Id = null, $table= 'chapter'){
			$userId = $_SESSION['user']['userId'];
        $result = $this->db->con->query("SELECT * FROM {$table} where chapterId IN (SELECT chapterId FROM chapterdata where userId = '{$userId}') ");

        $resultArray = array();

        // fetch chapter data one by one
        while ($chapter = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $chapter;
        }

        return $resultArray;
    }
	
}