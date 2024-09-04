<?php
include_once "db.php";
$type = $_POST['type'];
unset($_POST['type']);
$_POST['acc'] = $_SESSION['user'];
switch ($type) {
    case "del":
        $DB->del($_POST);
        break;
    case "add":
        $DB->save($_POST);
        break;
}
