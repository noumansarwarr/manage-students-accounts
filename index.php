<?php

/**
 * Including back-end functions
 *
 * Includes the file one time
 */

require_once "back-end/app.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
          crossorigin="anonymous">
</head>

<body>
<div class="container">
    <h2 class="mt-4">Student Management System</h2>

    <form autocomplete="off" method="post" action="index.php">
        <h3>Add Student</h3>
        <div class="form-group row">
            <label for="registrationNumber" class="col-sm-2 col-form-label">Registration Number:<sup
                class="text-danger">*</sup></label>

            <div class="col-sm-10">
                <input type="number" id="registrationNumber" name="registrationNumber"
                       class="form-control" required>

            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name:<sup class="text-danger">*</sup></label>

            <div class="col-sm-10">
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="grade" class="col-sm-2 col-form-label">Grade:<sup
                class="text-danger">*</sup></label>

            <div class="col-sm-10">
                <input type="number" id="grade" name="grade" min="0" max="10" class="form-control"
                       required>
            </div>
        </div>
        <div class="form-group row">
            <label for="classroom" class="col-sm-2 col-form-label">Classroom:<sup
                class="text-danger">*</sup></label>
            <div class="col-sm-10">
                <select id="classroom" name="classroom" class="custom-select" required>
                    <option value="" selected hidden disabled>Select an Option</option>
                    <option value="Fundamental of Programming">Fundamental of Programming</option>
                    <option value="Object Oriented Programming">Object Oriented Programming</option>
                    <option value="Data Structures and Algorithms">Data Structures and Algorithms
                    </option>
                </select>
            </div>
        </div>
        <button type="submit" name="addStudent" class="btn btn-primary float-right">Add Student</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
        crossorigin="anonymous"></script>
</body>

</html>