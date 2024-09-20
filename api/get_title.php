<?php
include_once "db.php";
$rows = $DB->all($_POST);
foreach ($rows as $row) {
?>
    <div onclick="getArticle(<?= $row['id'] ?>)" style="margin:10px 0"><?= $row['title'] ?></div>
<?php
}
?>