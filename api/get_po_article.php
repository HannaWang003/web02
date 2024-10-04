<?php
include_once "db.php";
$row = $DB->find($_POST);
?>
<h3><?= $row['title'] ?></h3>
<?= nl2br($row['text']) ?>