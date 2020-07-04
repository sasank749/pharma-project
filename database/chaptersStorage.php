<?php

// php chaptersStorage class
class chaptersStorage
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into chaptersStorage table
    public  function insertIntoChaptersStorage($params = null, $table = "chapterdata"){
        if ($this->db->con != null){
            if ($params != null){
                // "Insert into chaptersStorage(user_id) values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',' , array_values($params));
				

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)  ", $table, $columns, $values);
			  
			  //$query_string = sprintf("INSERT INTO chapterdata(userId,chapterId,compl_date) VALUES()";

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // to get user_id and chapterId and insert into chaptersStorage table
    public  function addToChaptersStorage($userid,$chapterId){
        if (isset($userid) && isset($chapterId)){
            $params = array(
                "userId" => $userid,
                "chapterId" => $chapterId,
				"chapcompldate" =>"now()"
				
            );

            // insert data into ChaptersStorage
            $result = $this->insertIntoChaptersStorage($params);
            
        }
    }

    // delete chapterdata  using chapterdataTable chapterid
    public function deleteChaptersStorage($chapterId = null, $table = 'chapterdata'){
        if($chapterId != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE chapterId={$chapterId}");
            
            return $result;
        }
    }

    // calculate sub total
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $chapter){
                $sum += floatval($chapter[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }

    // get chapterid of chaptersstorage list
    public function getChaptersStorageId($ChaptersStorageArray = null, $key = "chapterId"){
        if ($ChaptersStorageArray != null){
            $ChaptersStorage_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $ChaptersStorageArray);
            return $ChaptersStorage_id;
        }
    }

    


}