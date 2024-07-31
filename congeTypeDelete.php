<?php
require_once('CongeTypeClass.php');

if (isset($_GET['id'])) {
    $ct = new CongeType();
    $ct->__set("id", $_GET['id']);
    $ct->delete();
    header('Location: congeTypeList.php');
}
