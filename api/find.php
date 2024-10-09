<?php
include_once "db.php";
$res = $DB->find($_POST);
if (!empty($res)) {
?>
    <b>您的密碼為 : <?= $res['pw'] ?></b>
<?php
} else {
?>
    <b style="color:red">查無此資料</b>
<?php
}
?>