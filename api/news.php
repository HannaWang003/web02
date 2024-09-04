<?php
include_once "db.php";
foreach ($_POST['id'] as $key => $id) {
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        $DB->del($id);
    } else {
        $sh = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? "1" : "0";
        $DB->save(['id' => $id, 'sh' => $sh]);
    }
}
to("../back.php?do=$table");
