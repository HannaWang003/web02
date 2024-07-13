<?php
include_once "db.php";
$Que->save(['text' => $_POST['big'], 'big_id' => 0]);
$big_id = $Que->max('id');
foreach ($_POST['sub'] as $sub) {
    $Que->save(['text' => $sub, 'big_id' => $big_id]);
}
to("../back.php?do=que");
