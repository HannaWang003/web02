<?php
include_once "db.php";
$good = $_POST['good'];
unset($_POST['good']);
$_POST['acc'] = $_SESSION['user'];
if ($good == 0) {
    echo $DB->del($_POST);
} else {
    echo $DB->save($_POST);
}
