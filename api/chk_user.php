<?php
include_once "db.php";
if (isset($_POST['acc'], $_POST['pw'])) {
    echo $res = $DB->count($_POST);
    if ($res > 0) {
        $_SESSION['user'] = $_POST['acc'];
    }
} else {
    echo $DB->count(['acc' => $_POST['acc']]);
}
