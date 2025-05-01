<?php

include_once("connection.php");
include_once("models/DB.class.php");
include_once("models/Student.class.php");
include_once("models/Course.class.php");
include_once("views/Student.view.php");

class StudentController{
    private $student;
    private $course;

    function __construct(){
        $this->student = new Student(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
        $this->course = new Course(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
    }

    public function index(){
        $this->student->open();
        $this->course->open();
    
        $students = $this->student->getStudent();
        $courses = $this->course->getCourse();
    
        $data = array(
            'student' => array(),
            'course' => array()
        );
    
        while($row = $students->fetch_assoc()){
            array_push($data['student'], $row);
        }
    
        while($row = $courses->fetch_assoc()){
            array_push($data['course'], $row);
        }
    
        $view = new StudentView();
        $view->render($data);
    }    

    function add($data){
        $this->student->open();

        $this->student->add($data);

        $this->student->close();

        header("location:index.php");
    }

    function editForm($id) {
        $this->student->open();
        $this->course->open();
    
        $studentData = $this->student->getById($id);
        $courseData = $this->course->getCourse();
    
        $student = $studentData->fetch_assoc();
    
        $view = new StudentEditView();
        $view->render($student, $courseData);
    
        $this->student->close();
        $this->course->close();
    }
    
    function edit($id, $data){
        $this->student->open();

        $this->student->edit($id, $data);

        $this->student->close();

        header("location:student.php");
    }

    function delete($id){
        $this->student->open();

        $this->student->delete($id);

        $this->student->close();

        header("location:student.php");
    }
}