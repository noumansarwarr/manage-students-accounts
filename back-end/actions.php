<?php

/**
 * displayErrorMessage action. To display error messages
 *
 * @param $message
 * @return void
 */
function displayErrorMessage($message): void
{
    echo "<div class='alert alert-danger'>$message</div>";
}

/**
 * isRegistrationNumberExists action. To check if a registration number already exists
 *
 * @param $fileName
 * @param $registrationNumber
 * @return bool
 */
function isRegistrationNumberExists($fileName, $registrationNumber): bool
{
    if (file_exists($fileName)) {
        $json = file_get_contents($fileName);
        $students = json_decode($json, true);
        if (!empty($students)) {
            foreach ($students as $student) {
                if ($student['registrationNumber'] === (int)$registrationNumber) {
                    return true;
                }
            }
        }
    }
    return false;
}

// Function to display success messages
/**
 * @param $message
 * @return void
 */
function displaySuccessMessage($message): void
{
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
              $message
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>";
}

/**
 * Add student action. To add a new student
 *
 * @param $fileName
 * @param $registrationNumber
 * @param $name
 * @param $grade
 * @param $classroom
 * @return void
 */
function addStudent($fileName, $registrationNumber, $name, $grade, $classroom): void
{
    if (isRegistrationNumberExists($fileName, $registrationNumber)) {
        displayErrorMessage("Registration number already exists.");
        return;
    }
    addStudentToFileJSON($fileName, $registrationNumber, $name, $grade, $classroom);
    displaySuccessMessage("Added Successfully!");
}

/**
 * updateStudent action. To update the student data based on their registration number
 *
 * @param $registrationNumber
 * @param $name
 * @param $grade
 * @param $classroom
 * @return void
 */
function updateStudent($fileName, $registrationNumber, $name, $grade, $classroom): void
{
    //read all students data from JSON file
    $students = readFromFileJSON($fileName);
    foreach ($students as &$student) {
        //update requested student data
        if ($student['registrationNumber'] === (int)$registrationNumber) {
            $student['name'] = $name;
            $student['grade'] = $grade;
            $student['classroom'] = $classroom;
        }
    }
    updateStudentFileJSON($fileName, $students);
    displaySuccessMessage("Updated Successfully!");
}