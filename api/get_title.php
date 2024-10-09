<?php
include_once "db.php";
$rows = $DB->all($_POST);
foreach ($rows as $row) {
?>
    <h4 onclick="getArticle(<?= $row['id'] ?>)"><?= $row['title'] ?></h4>
<?php
}
?>