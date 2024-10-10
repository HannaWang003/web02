<?php
include_once "db.php";
if (isset($_POST['acc'], $_POST['pw'], $_POST['email'])) {
    echo $DB->save($_POST);
} elseif (isset($_POST['acc'], $_POST['pw'])) {
    echo $res = $DB->count($_POST);
    if ($res >= 1) {
        $_SESSION['user'] = $_POST['acc'];
    }
} else {
    echo $DB->count($_POST);
}
