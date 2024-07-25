<?php
include_once "db.php";
$res = $User->find(['email' => $_POST['email']]);
if (empty($res)) {
    echo "查無此資料";
} else {
    echo "您的密碼是:<b style='color:red'>{$res['pw']}</b>";
}
