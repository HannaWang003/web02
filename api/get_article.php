<?php
include_once "db.php";
$row = $DB->find($_POST);
echo "<h1>{$row['type']}</h1>";
echo $row['text'];
