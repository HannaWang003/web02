<?php
include_once "db.php";
$row = $DB->find($_POST);
if (!empty($row)) {
    echo "您的密碼為:<span style='color:red'>{$row['pw']}</span>";
} else {
    echo "查無此資料";
}
