<?php
require_once('DepartementClass.php');

if (isset($_GET['id'])) {
    $dep = new Departement();
    $dep->__set("id", $_GET['id']);
    $dep->delete();
    header('Location: departementList.php');
}
