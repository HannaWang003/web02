<?php
include_once "db.php";
$s = $Que->find($_POST['id']);
$b = $Que->find($s['big_id']);
$s['vote']++;
$b['vote']++;
$Que->save($s);
$Que->save($b);
to("../index.php?do=res&id={$b['id']}");
