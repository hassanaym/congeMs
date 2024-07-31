<?php
require_once('DepartementClass.php');

if (isset($_POST['save-departement'])) {
    echo $_POST['manager'];
    $dep = new Departement();
    $dep->__set("name", $_POST['name']);
    $dep->__set("manager", $_POST['manager']);
    $dep->save();
    header('Location: departementList.php');
}
