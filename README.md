# Student Management System

A simple web application helps you to manage students easily. Each student has a registration number, name, grade, and classroom.

Let's explore its features:

## Features:
1. **Add a new student:** You can add a new student to the system. Provide their registration number, name, grade, and classroom.
2. **List the students:** View a list of all the students currently stored in the system. This helps you keep track of all the students enrolled.
3. **Update a student:** Edit the details of a student. You can modify their registration number, name, grade, or classroom as needed.
4. **Delete a student:** Remove a student from the system if they are no longer enrolled or if the information is incorrect.

## Validations:
The application includes some validations:

* The grade should be a number between 0 and 10. This ensures that the grade entered is within the expected range.
* Duplicate registration numbers are not allowed. Each student must have a unique registration number.    

## Technical Details:

1. [x] Conventional commit messages
2. [x] PHP 8.2
3. [x] HTML, CSS and Bootstrap
4. [x] Fully tested
5. [x] Error handling and user-friendly messages

### Note:

This does not involve any database. Instead, a JSON file is used to store the students' data
which provides simplicity and ease of use without the need for complex database configurations.