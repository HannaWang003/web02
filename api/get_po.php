<?php
include_once "db.php";
$rows = $DB->all($_POST);
foreach ($rows as $row) {
?>
    <div onclick="getArticle(this)">
        <p><?= $row['title'] ?></p>
        <div style="display:none">
            <h3><?= $row['title'] ?></h3>
            <pre><?= $row['text'] ?></pre>
        </div>
    </div>
<?php
}
?>