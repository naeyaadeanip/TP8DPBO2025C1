<?php

include_once("models/DB.class.php");
include_once("views/Student.edit.view.php");


class Student extends DB{
    function getStudent(){
        $query = "SELECT * FROM student";
        return $this->execute($query);
    }

    function add($data){
        $name = $data["name"];
        $nim = $data["nim"];
        $phone = $data["phone"];
        $join_date = $data["join_date"];
        $course_id = $data["course_id"];  // Ambil course_id dari data
    
        $query = "INSERT INTO student (name, nim, phone, join_date, course_id) 
                  VALUES ('$name', '$nim', '$phone', '$join_date', '$course_id')";
    
        return $this->execute($query);
    }

    function delete($id){
        $query = "DELETE FROM student WHERE id = '$id'";
        return $this->execute($query);
    }

    function edit($id, $data){
        $name = $data["name"];
        $nim = $data["nim"];
        $phone = $data["phone"];
        $join_date = $data["join_date"];
        $course_id = $data["course_id"];
    
        $query = "UPDATE student SET 
                    name = '$name', 
                    nim = '$nim', 
                    phone = '$phone', 
                    join_date = '$join_date', 
                    course_id = '$course_id' 
                  WHERE id = '$id'";
    
        return $this->execute($query);
    }

    function getById($id) {
        $query = "SELECT * FROM student WHERE id = '$id'";
        return $this->execute($query);
    }
    
    
}