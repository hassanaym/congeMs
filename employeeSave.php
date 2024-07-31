<?php
require_once('EmployeeClass.php');

if (isset($_POST['save-employee'])) {
    $employee = new Employee();
    $employee->__set("registration", $_POST['registration']);
    $employee->__set("firstname", $_POST['firstname']);
    $employee->__set("lastname", $_POST['lastname']);
    $employee->__set("address", $_POST['address']);
    $employee->__set("dob", $_POST['dob']);
    $employee->__set("pob", $_POST['pob']);
    $employee->__set("startDate", $_POST['start-date']);
    $employee->__set("works", $_POST['works']);
    $employee->__set("manage", $_POST['manage']);
    $employee->save();
    header('Location: employeeList.php');
}
