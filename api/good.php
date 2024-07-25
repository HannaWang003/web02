<?php
include_once "db.php";
$good = $_GET['good'];
switch ($good) {
    case 0:
        $Log->del(['acc' => $_SESSION['user'], 'news_id' => $_GET['news_id']]);
        $n = $News->find($_GET['news_id']);
        $n['good']--;
        $News->save($n);
        break;
    case 1:
        $Log->save(['acc' => $_SESSION['user'], 'news_id' => $_GET['news_id']]);
        $n = $News->find($_GET['news_id']);
        $n['good']++;
        $News->save($n);
        break;
}
