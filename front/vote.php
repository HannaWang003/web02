<?php
$rows = $Que->all(['big_id' => $_GET['id']]);
$subject = $Que->find($_GET['id']);
?>
<fieldset class="aut tab">
    <legend>目前位置：首頁 > 問卷調查 > <?= $subject['text'] ?></legend>
    <b><?= $subject['text'] ?></b>
    <form action="./api/vote.php?do=que" method="post">
        <?php
        foreach ($rows as $row) {
        ?>
        <div style="margin:10px 5px;"><input type="radio" name="id"
                value="<?= $row['id'] ?>"><span><?= $row['text'] ?></span></div>
        <?php
        }
        ?>
        <div class="ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>