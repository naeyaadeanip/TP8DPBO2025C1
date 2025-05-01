<?php

include_once("models/DB.class.php");

class Course extends DB {
    function getCourse() {
        $query = "SELECT * FROM course";
        return $this->execute($query); // Mengambil semua course
    }

    function getCourseById($id) {
        $query = "SELECT * FROM course WHERE id = '$id'";
        return $this->execute($query); 
    }

    function add($data) {
        $course_name = $data["course_name"];
        $description = $data["description"];

        $query = "INSERT INTO course (course_name, description) VALUES ('$course_name', '$description')";
        return $this->execute($query); // Menambahkan course baru
    }

    function edit($id, $data) {
        $course_name = $data["course_name"];
        $description = $data["description"];

        $query = "UPDATE course SET course_name = '$course_name', description = '$description' WHERE id = '$id'";
        return $this->execute($query); // Mengedit course berdasarkan ID
    }

    function delete($id) {
        $query = "DELETE FROM course WHERE id = '$id'";
        return $this->execute($query); // Menghapus course berdasarkan ID
    }
}
?>
