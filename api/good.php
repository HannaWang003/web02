<?php
include_once "db.php";
switch ($_GET['good']) {
    case "del":
        $Log->del(['news' => $_GET['id'], 'acc' => $_SESSION['user']]);
        $n = $News->find($_GET['id']);
        $n['good']--;
        $News->save($n);
        break;
    case "add":
        $Log->save(['news' => $_GET['id'], 'acc' => $_SESSION['user']]);
        $n = $News->find($_GET['id']);
        $n['good']++;
        $News->save($n);

        break;
}
