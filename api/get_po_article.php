<?php
include_once "db.php";
$row = $DB->find($_POST);
echo "<h3>{$row['title']}</h3>";
echo nl2br($row['text']);