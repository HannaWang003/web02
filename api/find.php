<?php
include_once "db.php";
$res = $DB->find($_POST);
if ($res == "") {
?>
    <span style="color:red">查無此資料</span>
<?php
} else {
?>
    <span>您的密碼為 : <b><?= $res['pw'] ?></b></span>
<?php
}
?>