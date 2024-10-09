<?php
include_once "db.php";
$type = $_POST['type'];
unset($_POST['type']);
$_POST['acc'] = $_SESSION['user'];
dd($_POST);
if ($type == 0) {
    $Log->del($_POST);
} else {
    $Log->save($_POST);
}
