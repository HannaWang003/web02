<?php
include_once "db.php";
if ($_POST['good'] == 1) {
    $DB->save(['acc' => $_SESSION['user'], 'news' => $_POST['news']]);
} else {
    $DB->del(['acc' => $_SESSION['user'], 'news' => $_POST['news']]);
}
