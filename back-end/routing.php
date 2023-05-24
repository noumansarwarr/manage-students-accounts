<?php

global $fileName;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the submitted form
    if (isset($_POST['addStudent'])) {
        $registrationNumber = $_POST['registrationNumber'];
        $name = $_POST['name'];
        $grade = $_POST['grade'];
        $classroom = $_POST['classroom'];

        // Validate grade
        if (!is_numeric($grade) || $grade < 0 || $grade > 10) {
            displayErrorMessage("Invalid grade. Grade should be a number between 0 and 10.");
        } else {
            addStudent($fileName, $registrationNumber, $name, $grade, $classroom);
        }
    }
}

// Read students data from json file to list the students
$students = readFromFileJSON($fileName);