<?php

if (isset($_POST['save-departement'])) {
    require_once('DepartementClass.php');
    $dep = new Departement();
    $dep->__set("name", $_POST['name']);
    $dep->__set("manager", $_POST['manager']);
    $dep->save();
    header('Location: departementList.php');
}

if (isset($_POST['save-employee'])) {
    require_once('EmployeeClass.php');

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
