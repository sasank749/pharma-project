<?php

// php cart class
class Usercourses
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into cart table
    public  function insertIntoUsercourses($params = null, $table = "usercourses"){
        if ($this->db->con != null){
            if ($params != null){
                // "Insert into cart(user_id) values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',' , array_values($params));

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)  ", $table, $columns, $values );

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // to get user_id and courseid and insert into cart table
    public  function addToUsercourses($userid, $courseId){
        if (isset($userid) && isset($courseId)){
           $params = array(
			
                "userId" => $userid,
                "courseId" => $courseId,
				"courseregdate" =>"NOW()"
				);

            // insert data into cart
            $result = $this->insertIntoUsercourses($params);
		   
            if ($result){
                // Reload Page
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }

    // delete Usercourses item using Usercourses course id
    public function deleteUsercourses($userId = null,$courseId = null, $table = 'usercourses'){
        if($courseId != null && $userId != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE courseId={$courseId} AND userId={$userId}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // calculate sub total
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $course){
                $sum += floatval($course[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }

    // get courseId of  usercourses list
    public function getUsercoursesId($UsercoursesArray = null, $key = "courseId"){
        if ($UsercoursesArray != null){
            $Usercourses_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $UsercoursesArray);
            return $Usercourses_id;
        }
    }

   

}