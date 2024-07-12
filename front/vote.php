<?php
$big = $Que->find($_GET['id'])['text'];
$subs = $Que->all(['big_id' => $_GET['id']]);
?>
<fieldset class="tab aut">
    <legend>目前位置 : 首頁 > 問卷調查 > <?= $big ?></legend>
    <h3><?= $big ?></h3>
    <form action="./api/vote.php" method="post">
        <?php
        foreach ($subs as $idx => $sub) {
        ?>
        <div><input type="radio" name="vote" value="<?= $sub['id'] ?>"><?= $sub['text'] ?></div><br>
        <?php
        }

        ?>
        <div class="ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>