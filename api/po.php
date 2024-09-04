<?php
include_once "db.php";
$rows = $DB->all($_POST);
foreach ($rows as $row) {
?>
    <div onclick="getNews(<?= $row['id'] ?>)"><?= $row['title'] ?></div>
<?php
}

?>