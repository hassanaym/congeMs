<?php
require_once('EmployeeClass.php');

if (isset($_GET['id'])) {
    $employee = new Employee();
    $employee->__set("id", $_GET['id']);
    $employee->delete();
    header('Location: employeeList.php');
}
