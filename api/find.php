<?php
include_once "db.php";
$res = $DB->find($_POST);
if ($res != "") {
    echo "您的密碼為 : <b>{$res['pw']}</b>";
} else {
    echo "<span style='color:red;'>查無此資料</span>";
}
