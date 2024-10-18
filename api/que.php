<?php
include_once "db.php";
$_POST['mid'] = array_values(array_filter(array_map("trim", $_POST['mid'])));
if (!empty($_POST['big'] && $_POST['mid'])) {
    $DB->save(['text' => $_POST['big']]);
    $mid['big_id'] = $DB->max('id');
    foreach ($_POST['mid'] as $m) {
        $mid['text'] = $m;
        $DB->save($mid);
    }
}
to("../back.php?do=$do");
