<?php
include_once "db.php";
$row = $News->find($_GET['id']);
echo "<h3>" . $row['title'] . "</h3>";
echo nl2br($row['text']);
