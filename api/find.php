<?php
include_once "db.php";
$res = $DB->find($_POST);
if ($res != "") {
?>
    您的密碼為 : <b><?= $res['pw'] ?></b>
<?php
} else {
?>
    <span style="color:#f00">查無此資料</span>
<?php
}
?>