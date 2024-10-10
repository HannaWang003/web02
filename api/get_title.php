<?php
include_once "db.php";
$rows = $DB->all($_POST);
foreach ($rows as $row) {
?>
    <div class="clo" onclick="getArticle(<?= $row['id'] ?>)"><?= $row['title'] ?></div>
    </p>
<?php
}
