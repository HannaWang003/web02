<?php
include_once "db.php";
$res = $DB->all($_POST);
foreach ($res as $t) {
?>
    <div onclick="getSection(<?= $t['id'] ?>)" style="margin:15px"><?= $t['title'] ?></div>
<?php
}
?>