<?php
include_once "db.php";
$_POST['mid'] = array_filter($_POST['mid']);
if (!empty($_POST['big']) && !empty($_POST['mid'])) {
    $DB->save(['text' => $_POST['big']]);
    $max = $DB->max('id');
    foreach ($_POST['mid'] as $text) {
        if ($text != "") {
            $DB->save(['text' => $text, 'big_id' => $max]);
        }
    }
}
to("../back.php?do=$do");
