<?php
include_once "db.php";
if (isset($_POST['id'])) {
    $mid = $DB->find($_POST['id']);
    $mid['vote']++;
    $DB->save($mid);
    $big = $DB->find($mid['big_id']);
    $big['vote']++;
    $DB->save($big);
}
to("../index.php?do=result&id={$_POST['big']}");
