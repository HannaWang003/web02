<?php
include_once "db.php";
$sub = $Que->find(['id' => $_POST['vote']]);
$sub['vote']++;
$Que->save($sub);
$big = $Que->find($sub['big_id']);
$big['vote']++;
$Que->save($big);
to("../index.php?do=res&id={$big['id']}");
