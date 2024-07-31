<?php
require_once('CongeTypeClass.php');

if (isset($_POST['save-conge-type'])) {
    $ct = new CongeType();
    $ct->__set("typeName", $_POST['name']);
    $ct->__set("numberOfDays", $_POST['number-of-days']);
    $ct->save();
    header('Location: congeTypeList.php');
}
