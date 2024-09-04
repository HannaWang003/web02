<?php
include_once "db.php";
$item = $DB->find($_POST['id']);
$subject = $DB->find($item['big_id']);
$subject['vote']++;
$DB->save($subject);
$item['vote']++;
$DB->save($item);
to("../index.php?do=result&id={$subject['id']}");
