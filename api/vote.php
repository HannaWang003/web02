<?php
include_once "db.php";
if ($_POST['id'] != "") {
    $row = $DB->find($_POST);
    $row['vote']++;
    $DB->save($row);
    $big = $DB->find($row['big_id']);
    $big['vote']++;
    $DB->save($big);
}
to("../index.php?do=result&id={$_GET['id']}");
