<?php
include_once "db.php";
$table = $_POST['table'];
$DB = ${ucfirst($table)};
if (isset($_POST['del'])) {
    foreach ($_POST['del'] as $id) {
        $DB->del($id);
    }
}
to("../back.php?do=$table");
