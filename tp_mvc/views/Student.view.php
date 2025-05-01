<?php
require_once("views/Template.class.php");

class StudentView{
    public function render($data){
        
        $no = 1;
        $dataStudent = null;
        $dataCourse = null;

    
        foreach ($data['course'] as $val) {
            // Deteksi apakah array asosiatif atau numerik
            if (isset($val['id']) && isset($val['course_name'])) {
                // Jika array asosiatif
                $course_id = $val['id'];
                $course_name = $val['course_name'];
            } elseif (isset($val[0]) && isset($val[1])) {
                // Jika array numerik
                $course_id = $val[0];
                $course_name = $val[1];
            } else {
                continue; // Skip jika format tidak sesuai
            }
        
            // Tambahkan <option> untuk select
            $dataCourse .= "<option value='$course_id'>$course_name</option>";
        }
        

    
        // Generate data student untuk tabel
        foreach ($data['student'] as $val){
            $id = $val['id'];
            $name = $val['name'];
            $nim = $val['nim'];
            $phone = $val['phone'];
            $join_date = $val['join_date'];
            $course_id = $val['course_id'];
        
            // Cari nama course berdasarkan course_id
            $course_name = "-";
            foreach ($data['course'] as $course) {
                if ($course['id'] == $course_id) {
                    $course_name = $course['course_name'];
                    break;
                }
            }
        
            $dataStudent .= "<tr class='text-center align-middle'>
                                <td>" . $no++ . "</td>
                                <td>" . $name . "</td>
                                <td>" . $nim . "</td>
                                <td>" . $phone . "</td>
                                <td>" . $join_date . "</td>
                                <td>" . $course_name . "</td>
                                <td><a href='index.php?id_edit=" . $id . "' class='btn btn-warning'>Edit</a>
                                     <a href='index.php?id_delete=" . $id . "' class='btn btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Delete</a></td>
                             </tr>";
        }        
    
        $tpl = new Template("templates/index.html");
        $tpl->replace("JUDUL", "Student");
        $tpl->replace("OPTION", $dataCourse);
        $tpl->replace("DATA_STUDENT", $dataStudent);
        $tpl->write();
    }    
}