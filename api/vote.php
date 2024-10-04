<?php
include_once "db.php";
$mid = $DB->find($_POST['vote']);
$mid['vote']++;
$DB->save($mid);
$big = $DB->find($mid['big_id']);
$big['vote']++;
$DB->save($big);
to("../index.php?do=result&id={$big['id']}");
