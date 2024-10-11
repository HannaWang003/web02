<?php
include_once "db.php";
$_POST['mid'] = array_filter($_POST['mid']);
if (!empty($_POST['big'] && $_POST['mid'])) {
    $DB->save(['text' => $_POST['big']]);
    $bigid = $DB->max('id');
    foreach ($_POST['mid'] as $midtext) {
        $DB->save(['text' => $midtext, 'big_id' => $bigid]);
    }
}
to("../back.php?do=$do");
