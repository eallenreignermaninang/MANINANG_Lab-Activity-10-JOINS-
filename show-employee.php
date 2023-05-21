<?php
require "config.php";

use App\Employee;

if (isset($_GET['dept_no'])) {
    $dept_no = $_GET['dept_no'];
    $employees = Employee::getById($dept_no);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <style>
        .header {
            text-align: center;
            color: green;
            padding: 20px;
        }
        .return-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="btn btn-default return-button">Return</a>
        <div class="header">
            <h1>LIST OF EMPLOYEES</h1>
        </div>
        <?php if (isset($employees) && count($employees) > 0) { ?>
            <table id="myTable" class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>TITLE</th>
                        <th>FULL NAME</th>
                        <th>BIRTHDAY</th>
                        <th>AGE</th>
                        <th>GENDER</th>
                        <th>HIRE DATE</th>
                        <th>SALARY</th>
                        <th>SALARY HISTORY</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee) { ?>
                        <tr>
                            <td><?php echo $employee->getTitle(); ?></td>
                            <td><?php echo $employee->getFullName(); ?></td>
                            <td><?php echo $employee->getBirth(); ?></td>
                            <td><?php echo $employee->getAge(); ?></td>
                            <td><?php echo $employee->getGender(); ?></td>
                            <td><?php echo $employee->getStartDate(); ?></td>
                            <td><?php echo $employee->getSalary(); ?></td>
                            <td>
                                <a href="show-salary.php?emp_no=<?php echo $employee->getEmpNo(); ?>">VIEW</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No employees found for department <?php echo $dept_no; ?></p>
        <?php } ?>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>
