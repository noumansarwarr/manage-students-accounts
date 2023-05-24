<?php

/**
 * Add new student and stores into the json file
 *
 * @param string $fileName
 * @param int $registrationNumber
 * @param string $name
 * @param int $grade
 * @param string $classroom
 * @return void
 */
function addStudentToFileJSON(string $fileName, int $registrationNumber, string $name, int $grade, string $classroom): void
{
    if (is_writable($fileName)) {
        $students = json_decode(file_get_contents($fileName), true);
        $students[] = [
            'registrationNumber' => $registrationNumber,
            'name' => $name,
            'grade' => $grade,
            'classroom' => $classroom,
        ];

        if (!file_put_contents($fileName, json_encode($students))) {
            echo "Cannot write to the file!";
        }
    }
}

/**
 * Reads the content from JSON file and returns as an array
 * @param string $fileName
 * @return array - returns array of tasks
 */
function readFromFileJSON(string $fileName): array
{
    $students = [];

    if (file_exists($fileName) && filesize($fileName) > 0) {
        $json = file_get_contents($fileName);
        $students = json_decode($json, true);
        krsort($students);
    }
    return $students;
}

/**
 * Update the student data in JSON file
 *
 * @param string $fileName
 * @param array $students
 * @return void
 */
function updateStudentFileJSON(string $fileName, array $students): void
{
    if (is_writable($fileName)) {
        if (!file_put_contents($fileName, json_encode($students))) {
            echo "Cannot write to the file!";
        }
    }
}