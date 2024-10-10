<?php
include_once "db.php";
$row = $DB->find($_POST);
echo "<h2>{$row['type']}</h2>";
echo nl2br($row['text']);
