<?php
include_once "db.php";
$res = $User->find(['email' => $_POST['email']]);
if (!empty($res)) {
    echo "你的密碼為: " . $res['pw'];
} else {
    echo "查無此資料";
}
