<?php
require_once('CongeClass.php');

if (isset($_POST['save-conge'])) {
    $conge = new Conge();
    $conge->__set("date", $_POST['date']);
    $conge->__set("startsAt", $_POST['starts-at']);
    $conge->__set("endsAt", $_POST['ends-at']);
    $conge->__set("status", $_POST['status']);
    $conge->__set("employee", $_POST['employee']);
    $conge->__set("congeType", $_POST['conge-type']);
    $conge->save();
    header('Location: congeList.php');
}
