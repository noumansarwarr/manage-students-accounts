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

        if(!file_put_contents($fileName, json_encode($students))){
            echo "Cannot write to the file!";
        }
    }
}