<?php

class StudentEditView {
    public function render($student, $courseList) {
        echo "
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                padding: 20px;
            }

            h2 {
                text-align: center;
                margin-bottom: 20px;
            }

            form {
                max-width: 600px;
                margin: 0 auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .form-group {
                margin-bottom: 15px;
            }

            .form-group label {
                display: block;
                font-weight: bold;
                margin-bottom: 5px;
            }

            .form-group input,
            .form-group select {
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ddd;
                border-radius: 4px;
            }

            .form-group select {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
            }

            .form-group button {
                background-color:rgb(0, 119, 255);
                color: white;
                padding: 15px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                width: 100%;
            }

            .form-group button:hover {
                background-color:rgb(69, 98, 160);
            }

            .form-group a {
                display: inline-block;
                margin-top: 10px;
                text-align: center;
                color: #007bff;
                text-decoration: none;
                font-size: 16px;
            }

            .form-group a:hover {
                text-decoration: underline;
            }
        </style>
        ";

        echo "<h2>Edit Student</h2>";
        echo "<form action='index.php' method='POST'>"; 
        echo "<input type='hidden' name='id' value='{$student['id']}'>";

        echo "<div class='form-group'>
                <label for='name'>Nama:</label>
                <input type='text' id='name' name='name' value='{$student['name']}' required>
              </div>";

        echo "<div class='form-group'>
                <label for='nim'>NIM:</label>
                <input type='text' id='nim' name='nim' value='{$student['nim']}' required>
              </div>";

        echo "<div class='form-group'>
                <label for='phone'>Phone:</label>
                <input type='text' id='phone' name='phone' value='{$student['phone']}' required>
              </div>";

        echo "<div class='form-group'>
                <label for='join_date'>Join Date:</label>
                <input type='date' id='join_date' name='join_date' value='{$student['join_date']}' required>
              </div>";

        echo "<div class='form-group'>
                <label for='course'>Course:</label>
                <select name='course_id' required>";

        foreach ($courseList as $course) {
            $selected = ($course['id'] == $student['course_id']) ? "selected" : "";
            echo "<option value='{$course['id']}' $selected>{$course['course_name']}</option>";
        }
        echo "</select>
              </div>";

        echo "<div class='form-group'>
                <button type='submit' name='edit'>Update</button>
              </div>";

        echo "<div class='form-group'>
                <a href='index.php'>Cancel</a>
              </div>";
        echo "</form>";
    }
}

