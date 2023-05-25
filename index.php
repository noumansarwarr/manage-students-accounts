<?php

/**
 * Including back-end functions
 *
 * Includes the file one time
 */

require_once "back-end/app.php";

$itemsPerPage = 5;
$totalItems = count($students);
$totalPages = ceil($totalItems / $itemsPerPage);
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$startIndex = ($currentPage - 1) * $itemsPerPage;
$paginatedStudents = array_slice($students, $startIndex, $itemsPerPage);

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

    <h3 class="mt-4">Students List</h3>
    <?php if (empty($paginatedStudents)) : ?>
        <p>No students found.</p>
    <?php else : ?>
        <!--Table start-->
        <table class="table">
            <thead>
            <tr>
                <th>Registration Number</th>
                <th>Name</th>
                <th>Grade</th>
                <th>Classroom</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($paginatedStudents as $student) : ?>
                <tr>
                    <td><?php echo $student['registrationNumber']; ?></td>
                    <td><?php echo $student['name']; ?></td>
                    <td><?php echo $student['grade']; ?></td>
                    <td><?php echo $student['classroom']; ?></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#updateStudentModal<?php echo $student['registrationNumber']; ?>">Update
                        </button>

                        <!--Update Student Data Modal start-->
                        <div class="modal fade" id="updateStudentModal<?php echo $student['registrationNumber']; ?>"
                             data-backdrop="static" data-keyboard="false"
                             tabindex="-1" aria-labelledby="updateStudentModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form autocomplete="off" method="post" action="index.php">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateStudentModalLabel">Update Student</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="registrationNumber"
                                                   value="<?php echo $student['registrationNumber']; ?>">

                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">Name:<sup
                                                        class="text-danger">*</sup></label>

                                                <div class="col-sm-10">
                                                    <input type="text" id="name" name="name"
                                                           value="<?php echo $student['name']; ?>" class="form-control"
                                                           required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="grade" class="col-sm-2 col-form-label">Grade:<sup
                                                        class="text-danger">*</sup></label>

                                                <div class="col-sm-10">
                                                    <input type="number" id="grade" name="grade"
                                                           value="<?php echo $student['grade']; ?>" min="0" max="10"
                                                           class="form-control"
                                                           required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="classroom" class="col-sm-2 col-form-label">Classroom:<sup
                                                        class="text-danger">*</sup></label>
                                                <div class="col-sm-10">
                                                    <select id="classroom" name="classroom" class="custom-select"
                                                            required>
                                                        <option value="" selected hidden disabled>Select an Option
                                                        </option>
                                                        <option
                                                            value="Fundamental of Programming" <?php echo $student['classroom'] == 'Fundamental of Programming' ? 'selected' : ''; ?> >
                                                            Fundamental of Programming
                                                        </option>
                                                        <option
                                                            value="Object Oriented Programming" <?php echo $student['classroom'] == 'Object Oriented Programming' ? 'selected' : ''; ?> >
                                                            Object Oriented Programming
                                                        </option>
                                                        <option
                                                            value="Data Structures and Algorithms" <?php echo $student['classroom'] == 'Data Structures and Algorithms' ? 'selected' : ''; ?> >
                                                            Data Structures and Algorithms
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button type="submit" name="updateStudent" class="btn btn-primary">Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--Update Student Data Modal end-->
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <!--Table end-->

        <nav aria-label="Student pagination" class="float-right">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="page-item <?php echo $i == $currentPage ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    <?php endif; ?>
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