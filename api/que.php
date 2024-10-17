<?php
include_once "db.php";
$_POST['big'] = trim($_POST['big']);
$_POST['mids'] = array_filter($_POST['mids']);
if (!empty($_POST['big'] && $_POST['mids'])) {
    $row['text'] = $_POST['big'];
    $row['big_id'] = 0;
    $DB->save($row);
    $row['big_id'] = $DB->max('id');
    foreach ($_POST['mids'] as $mid) {
        $row['text'] = $mid;
        $DB->save($row);
    }
}
