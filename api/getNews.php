<?php
include_once "db.php";
$row = $News->find($_GET);
echo "<span style='font-weight:bolder'>{$row['title']}</span><br>";
echo nl2br($row['text']);
