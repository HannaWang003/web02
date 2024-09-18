<?php
include_once "db.php";
$res = $DB->all($_POST);
foreach ($res as $t) {
?>
    <div style="margin:15px" onclick="getArticle(<?= $t['id'] ?>)"><?= $t['title'] ?></div>
<?php
}
?>