<?php
$big = $Que->find($_GET['id']);
$subs = $Que->all(['big_id' => $_GET['id']]);
?>
<fieldset class="tab aut">
    <legend>目前位置 : 首頁 > 問卷調查 > <?= $big['text'] ?></legend>
    <h3><?= $big['text'] ?></h3>
    <?php
    foreach ($subs as $idx => $sub) {
        $width = round($sub['vote'] / $big['vote'], 2) * 100;
    ?>
    <div>
        <span style="display:inline-block;width:50%;"><?= $sub['text'] ?></span>
        <span style="display:inline-block;width:45%;height:30px;">
            <span style="display:inline-block;background:skyblue;height:30px;width:<?= $width ?>%"></span>
            <?= $sub['vote'] ?>票(<?= $width ?>%)
        </span>
    </div><br>
    <?php
    }

    ?>
    <div class="ct">
        <button onclick="location.href='?do=que'">返回</button>
    </div>
</fieldset>