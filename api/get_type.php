<?php
include_once "db.php";
$row = $DB->find($_POST);
?>
<h2><?= $row['type'] ?></h2>
<?= nl2br($row['text']) ?>