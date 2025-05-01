<?php

include_once("connection.php");
include_once("models/Course.class.php");
include_once("controllers/Course.controller.php");

$courseController = new CourseController();

if (isset($_POST['add'])) {
    $data = array(
        'course_name' => $_POST['course_name'],
        'description' => $_POST['description']
    );
    $courseController->add($data);
} else if (isset($_POST['edit'])) {
    $data = array(
        'id' => $_POST['id'],
        'course_name' => $_POST['course_name'],
        'description' => $_POST['description']
    );
    $courseController->edit($data);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $courseController->editForm($id); 
} else if (!empty($_GET['id_delete'])) {
    $id = $_GET['id_delete'];
    $courseController->delete($id); 
} else {
    $courseController->index();
}
?>
