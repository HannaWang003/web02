<?php
$big = $Que->find($_GET['id']);
$mids = $Que->all(['big_id' => $_GET['id']]);
?>
<fieldset>
    <legend>目前位置 : 首頁 > 問卷調查 > <?= $big['text'] ?></legend>
    <h3><?= $big['text'] ?></h3>
    <?php
    foreach ($mids as $mid) {
        $width = round($mid['vote'] / $big['vote'], 2) * 100;
    ?>
        <div style="margin:10px 5px;display:flex">
            <div style="width:40%;"><?= $mid['text'] ?></div>
            <div style="width:2%"></div>
            <div style="width:58%;"><span
                    style="display:inline-block;background:lawngreen;height:30px;width:<?= $width ?>%"></span><?= $mid['vote'] ?>票(<?= $width ?>%)
            </div>
        </div>
    <?php
    }
    ?>
    <div class="ct"><input type="button" value="返回" onclick="location.href='?do=que'"></div>
</fieldset>