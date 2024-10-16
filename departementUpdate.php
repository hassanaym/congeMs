<?php
require_once('DepartementClass.php');

if (isset($_POST['update-departement'])) {
    $dep = new Departement();
    $dep->__set("id", $_GET['id']);
    $dep->__set("name", $_POST['name']);
    $dep->__set("manager", $_POST['manager']);
    $dep->update();

    header('Location: departementList.php');
}
