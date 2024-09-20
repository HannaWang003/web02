<?php
include_once "db.php";
foreach ($_POST['del'] as $id) {
    $DB->del($id);
}
to("../back.php?do=$table");
