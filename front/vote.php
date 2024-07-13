<?php
$big = $Que->find($_GET['id']);
$rows = $Que->all(['big_id' => $_GET['id']]);
?>
<fieldset class="tab aut">
    <legend>目前位置: 問卷調查 > <?= $big['text'] ?></legend>
    <form action="./api/vote.php" method="post">
        <h3><?= $big['text'] ?></h3>
        <?php
    foreach ($rows as $row) {
    ?>
        <div><input type="radio" name="vote" value="<?= $row['id'] ?>"><?= $row['text'] ?></div><br>
        <?php
    }
    ?>
        <div class="ct"><button>我要投票</button></div>
    </form>
</fieldset>