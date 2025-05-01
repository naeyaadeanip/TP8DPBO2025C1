<?php

include_once("connection.php");
include_once("models/Course.class.php");
include_once("views/Course.view.php");
include_once("views/Course.edit.view.php");

class CourseController {
    private $course;

    function __construct() {
        $this->course = new Course(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
    }

    public function index() {
        $this->course->open();
        $courses = $this->course->getCourse(); // Mengambil semua course
        $data = array();

        while ($row = $courses->fetch_assoc()) {
            array_push($data, $row);
        }

        $this->course->close();

        $view = new CourseView();
        $view->render($data); // Tampilkan daftar course
    }

    function add($data) {
        $this->course->open();
        $this->course->add($data); // Menambahkan course baru
        $this->course->close();

        header("Location: course.php");
    }

    public function editForm($id) {
        $this->course->open(); //
        $result = $this->course->getCourseById($id); // Ambil data course berdasarkan ID
        $courseData = mysqli_fetch_assoc($result); // Ambil data course berdasarkan ID
        $this->course->close();
    
        if (!$courseData) {
            echo "Course not found.";
            exit;
        }
    
        $view = new CourseEditView(); 
        $view->render($courseData); // Tampilkan form edit course
    }

    public function edit($data) {
        $this->course->open();

        if (isset($data['id'])) {
            $this->course->edit($data['id'], $data); // Edit data course berdasarkan ID
        }

        $this->course->close();

        header("Location: course.php");
    }

    function delete($id) {
        $this->course->open();
        $this->course->delete($id); // Hapus course berdasarkan ID
        $this->course->close();

        header("Location: course.php");
    }
}
?>
