<?php
include_once "db.php";
$rows = $DB->all($_POST);
if (isset($_POST['type'])) {
    foreach ($rows as $row) {
?>
        <p onclick="getArticle(<?= $row['id'] ?>)"><?= $row['title'] ?></p>
    <?php
    }
} else {
    foreach ($rows as $row) {
    ?>
        <h3><?= $row['title'] ?></h3>
        <pre><?= $row['text'] ?></pre>
<?php
    }
}
?>