<?php
include_once "db.php";
$res = $DB->find($_POST);
if (!empty($res)) {
    echo "您的密碼為:{$res['pw']}";
} else {
    echo "查無此資料";
}
