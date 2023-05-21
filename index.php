<?php

require "config.php";
use App\Employee;

$employee = Employee::list();
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>LIST OF MANAGERS</h1>
        </div>
        <table id="myTable" class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>DEPARTMENT NUMBER</th>
                    <th>DEPARTMENT NAME</th>
                    <th>MANAGER NAME</th>
                    <th>HIRE DATE</th>
                    <th>END DATE</th>
                    <th>TOTAL YEARS</th>
                    <th>EMPLOYEES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($employee as $employee): ?>
                    <tr>
                        <td><?php echo $employee->getDeptNo();?></td>
                        <td><?php echo $employee->getDeptName();?></td>
                        <td><?php echo $employee->getFullName();?></td>
                        <td><?php echo $employee->getHireDate();?></td>
                        <td>Current</td>
                        <td><?php echo $employee->getTotalYear();?></td>
                        <td>
                            <a href="show-employee.php?dept_no=<?php echo $employee->getDeptNo();?>">VIEW</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>
