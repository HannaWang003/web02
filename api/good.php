<?php
include_once "db.php";
$_POST['acc'] = $_SESSION['user'];
$type = $_POST['type'];
unset($_POST['type']);
if ($type == 0) {
    $DB->del($_POST);
} elseif ($type == 1) {
    $DB->save($_POST);
}
