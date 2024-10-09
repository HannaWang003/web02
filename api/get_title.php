<?php
include_once "db.php";
$rows = $DB->all(['type' => $_POST['type'], 'sh' => 1]);
foreach ($rows as $row) {
?>
    <h4 onclick="getAllArticle(<?= $row['id'] ?>)"><?= $row['title'] ?></h4>
<?php
}
