<?php
include_once "db.php";
echo nl2br($DB->find($_POST)['text']);
