<?php
include_once "db.php";
$DB->save(['text' => $_POST['big']]);
$big_id = $DB->max('id');
foreach ($_POST['sub'] as $sub) {
    $DB->save(['text' => $sub, 'big_id' => $big_id]);
}
to("../back.php?do=$table");
