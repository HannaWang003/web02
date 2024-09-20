<?php
include_once "db.php";
if ($_POST['good'] == 0) {
    $DB->del(['acc' => $_SESSION['user'], 'news' => $_POST['news']]);
} else {
    $DB->save(['acc' => $_SESSION['user'], 'news' => $_POST['news']]);
}
