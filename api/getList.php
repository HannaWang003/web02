<?php
include_once "db.php";
$_GET['sh'] = 1;
$rows = $News->all($_GET);
foreach ($rows as $row) {
?>
<a href='Javascript:getNews(<?= $row['id'] ?>)'>
    <div><?= $row['title'] ?></div>
</a>
<?php
}
?>