<?php
include_once "db.php";
$_POST['sh']=1;
$rows = $DB->all($_POST);
foreach ($rows as $row) {
?>
<div onclick="getArticle(<?= $row['id'] ?>)" style="margin:10px 20px;"><?= $row['title'] ?></div>
<?php
}
?>