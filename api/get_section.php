<?php
include_once "db.php";
$row = $DB->find($_POST);
echo str_replace("(一)", "", $row['title']);
echo "<br>";
echo nl2br($row['text']);
