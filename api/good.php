<?php
include_once "db.php";
$good = $_POST['good'];
unset($_POST['good']);
$_POST['acc'] = $_SESSION['user'];
switch ($good) {
    case 0:
        $DB->del($_POST);
        break;
    case 1:
        $DB->save($_POST);
        break;
}
