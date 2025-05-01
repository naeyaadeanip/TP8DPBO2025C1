<?php
require_once("views/Template.class.php");

class CourseView{
    public function render($data){
        $no = 1;
        $dataCourse = null;

        foreach($data as $val){
            $id = $val['id'];
            $course_name = $val['course_name'];
            $deskripsi = $val['description'];

            $dataCourse .= "<tr>
                                <td>" . $no++ . "</td>
                                <td>" . $course_name . "</td>
                                <td>" . $deskripsi . "</td>
                                <td>
                                    <a href='course.php?id_edit=$id' class='btn btn-warning btn-sm me-1'>Edit</a>
                                    <a href='course.php?id_delete=$id' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus course ini?');\">Hapus</a>
                                </td>
                            </tr>";
        }

        $tpl = new Template('templates/course.html');
        $tpl->replace("JUDUL", "Course");
        $tpl->replace("DATA_COURSE", $dataCourse);
        $tpl->write();
    }
}
