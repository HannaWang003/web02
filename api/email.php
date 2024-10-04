<?php
include_once "db.php";
$res = $DB->find($_POST);
if ($res == "") {
    echo "查無此資料";
} else {
    echo "您的密碼為 : {$res['pw']}";
}
