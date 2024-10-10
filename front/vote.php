<?php
$big = $Que->find($_GET['id']);
$mids = $Que->all(['big_id' => $big['id']]);
?>
<style>
fieldset {
    p {
        background: #eee;
        padding: 10px 20px;
    }

    p:hover {
        background: #333;
        color: #fff;
    }
}
</style>
<fieldset class="fie aut">
    <legend><b>目前位置 : 首頁 > 問卷調查 > <?= $big['text'] ?></b></legend>
    <h4><?= $big['text'] ?></h4>
    <form action="./api/vote.php?do=que" method="post">
        <?php
        foreach ($mids as $mid) {
        ?>
        <p><input type="radio" name="id" value="<?= $mid['id'] ?>"><?= $mid['text'] ?></p>
        <?php
        }
        ?>
        <div class="ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>