<?php
$big = $Que->find($_GET['id']);
$mids = $Que->all(['big_id' => $big['id']]);
?>
<fieldset>
    <legend>
        <h3>目前位置 : 首頁 > 問卷調查 > <?= $big['text'] ?></h3>
    </legend>
    <h3 class="tab aut"><?= $big['text'] ?></h3>
    <form action="./api/vote.php?do=que" method="post">
        <div class="tab aut">
            <?php
            foreach ($mids as $mid) {
            ?>
                <div style="margin:20px 0"><input type="radio" name="id" value="<?= $mid['id'] ?>"><?= $mid['text'] ?></div>
            <?php
            }
            ?>
        </div>
        <div class="tab aut ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>