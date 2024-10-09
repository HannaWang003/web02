<?php
include_once "db.php";
if (!empty($_POST['big']) && !empty($_POST['mid'])) {
    $DB->save(['text' => $_POST['big']]);
    $big_id = $DB->max('id');
    foreach ($_POST['mid'] as $text) {
        if ($text != "") {
            $DB->save(['text' => $text, 'big_id' => $big_id]);
        }
    }
}
to("../back.php?do=$do");
