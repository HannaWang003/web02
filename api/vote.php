<?php
include_once "db.php";
if (empty($_POST)) {
    to("../index.php?do=que");
}
$mid = $DB->find($_POST);
$mid['vote']++;
$big = $DB->find($mid['big_id']);
$big['vote']++;
$DB->save($mid);
$DB->save($big);
to("../index.php?do=result&id={$big['id']}");
