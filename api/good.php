<?php
include_once "db.php";
$good = $_POST['good'];
unset($_POST['good']);
$_POST['acc'] = $_SESSION['user'];
switch ($good) {
    case 1:
        $DB->save($_POST);
        echo "<button onclick='good(this,{$_POST['news']},0)'>收回讚</button>";
        break;
    case 0:
        $DB->del($_POST);
        echo "<button onclick='good(this,{$_POST['news']},1)'>讚</button>";
        break;
}
