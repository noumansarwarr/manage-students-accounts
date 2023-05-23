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
}