<?php
include_once "db.php";
if (!empty($_POST)) {
    $mid = $DB->find($_POST);
    $big = $DB->find($mid['big_id']);
    $mid['vote']++;
    $big['vote']++;
    $DB->save($mid);
    $DB->save($big);
}
to("../index.php?do=result&id={$big['id']}");
