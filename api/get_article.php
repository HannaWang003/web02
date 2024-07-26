<?php
include_once "db.php";
$row = $Type->find($_GET['id']);
echo "<pre>";
echo $row['article'];
echo "</pre>";
