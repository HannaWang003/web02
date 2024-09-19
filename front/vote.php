<?php
$big = $Que->find($_GET['id']);
$mids = $Que->all(['big_id' => $_GET['id']]);
?>
<fieldset>
    <legend>目前位置 : 首頁 > 問卷調查 > <?= $big['text'] ?></legend>
    <h3><?= $big['text'] ?></h3>
    <form action="./api/vote.php?do=que" method="post">
        <?php
        foreach ($mids as $mid) {
        ?>
            <div style="margin:10px 5px"><input type="radio" name="id" value="<?= $mid['id'] ?>"><?= $mid['text'] ?></div>
        <?php
        }
        ?>
        <div class="ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>