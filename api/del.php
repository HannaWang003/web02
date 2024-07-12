<?php
include_once "db.php";
$table = $_POST['table'];
$DB = ${ucfirst($table)};
foreach ($_POST['id'] as $idx => $id) {
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        $DB->del($id);
    }
}
to("../back.php?do=$table");
