<?php
include_once "db.php";
$res = $DB->find($_POST);
if ($res == false) {
    echo "<h4 style='color:#f00'>查無此資料</h4>";
} else {
    echo "<h4>您的密碼為 : " . $res['pw'] . "</h4>";
}
