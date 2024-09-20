<?php
include_once "db.php";
if (!empty($_POST['big'])) {
    $DB->save(['text' => $_POST['big']]);
    $big_id = $DB->max('id');
    foreach ($_POST['mid'] as $mid) {
        if ($mid != "") {
            $DB->save(['text' => $mid, 'big_id' => $big_id]);
        }
    }
}
to("../back.php?do=$table");
