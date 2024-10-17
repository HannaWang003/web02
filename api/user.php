<?php
include_once "db.php";
if (isset($_POST['acc'], $_POST['pw'], $_POST['email'])) {
    $DB->save($_POST);
} elseif (isset($_POST['acc'], $_POST['pw'])) {
    echo $res = $DB->count($_POST);
    if ($res > 0) {
        $_SESSION['user'] = $_POST['acc'];
    }
} elseif (isset($_POST['acc'])) {
    echo $DB->count($_POST);
}
