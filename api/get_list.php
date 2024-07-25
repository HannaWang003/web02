<?php
include_once "db.php";
$rows = $News->all(['sh' => 1, 'type' => $_GET['id']]);
foreach ($rows as $row) {
?>

    <a href="Javascript:getNews(<?= $row['id'] ?>)">
        <div class="title"><?= $row['title'] ?></div>
    </a>
<?php
}
