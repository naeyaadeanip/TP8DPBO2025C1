<?php

class CourseEditView {
    public function render($course) {
        $course_name = isset($course['course_name']) ? $course['course_name'] : '';
        $description = isset($course['description']) ? $course['description'] : '';

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
            .form-group textarea {
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ddd;
                border-radius: 4px;
            }

            .form-group button {
                background-color: rgb(0, 119, 255);
                color: white;
                padding: 15px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                width: 100%;
            }

            .form-group button:hover {
                background-color: rgb(69, 98, 160);
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
        
        echo "<h2>Edit Course</h2>";

        echo "<form action='course.php' method='POST'>";

        echo "<input type='hidden' name='id' value='" . htmlspecialchars($course['id']) . "'>";

        echo "<div class='form-group'>
                <label for='course_name'>Nama Course:</label>
                <input type='text' id='course_name' name='course_name' value='" . htmlspecialchars($course_name) . "' required>
              </div>";

        echo "<div class='form-group'>
                <label for='description'>Deskripsi Course:</label>
                <textarea id='description' name='description' rows='4' required>" . htmlspecialchars($description) . "</textarea>
              </div>";

        echo "<div class='form-group'>
                <button type='submit' name='edit'>Update</button>
              </div>";

        echo "<div class='form-group'>
                <a href='course.php'>Cancel</a>
              </div>";

        echo "</form>";
    }
}
?>
