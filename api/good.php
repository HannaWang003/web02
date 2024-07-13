<?php
include_once "db.php";
switch ($_GET['type']) {
    case "del":
        $Log->del(['user' => $_SESSION['user'], 'news' => $_GET['id']]);
        $n = $News->find($_GET['id']);
        $n['good']--;
        $News->save($n);
        break;
    case "add":
        $Log->save(['user' => $_SESSION['user'], 'news' => $_GET['id']]);
        $n = $News->find($_GET['id']);
        $n['good']++;
        $News->save($n);
        break;
}
