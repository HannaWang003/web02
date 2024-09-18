<?php
include_once "db.php";
$res = $DB->find($_POST);
if (empty($res)) {
    echo 0;
} else {
    echo "<b style='color:red'>{$res['pw']}</b>";
}
