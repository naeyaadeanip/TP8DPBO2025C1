<?php
include_once("connection.php");
include_once("models/Student.class.php");
include_once("models/Course.class.php");
include_once("views/Student.view.php");
include_once("controllers/Student.controller.php");

$studentController = new StudentController();

if (isset($_POST['add'])) {
    $data = array(
        'name' => $_POST['name'],
        'nim' => $_POST['nim'],
        'phone' => $_POST['phone'],
        'join_date' => $_POST['join_date'],
        'course_id' => $_POST['course_id']
    );
    $studentController->add($data);
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $data = array(
        'name' => $_POST['name'],
        'nim' => $_POST['nim'],
        'phone' => $_POST['phone'],
        'join_date' => $_POST['join_date'],
        'course_id' => $_POST['course_id']
    );
    $studentController->edit($id, $data);

    header("location: index.php");
    exit;
} else if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $studentController->delete($id);
}else if (!empty($_GET['id_delete'])) {
    $id = $_GET['id_delete'];
    $studentController->delete($id);
    header("location: index.php");
    exit;
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $studentController->editForm($id); 
} else {
    $studentController->index();
}
