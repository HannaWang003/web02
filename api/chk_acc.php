<?php
include_once "db.php";
echo $res = $User->count(['acc' => $_POST['acc']]);
