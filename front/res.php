<?php
$big = $Que->find($_GET['id']);
$subs = $Que->all(['big_id' => $big['id']]);
?>
<fieldset class="tab aut">
    <legend>目前位置: 問卷調查 > <?= $big['text'] ?></legend>
    <?php
    foreach ($subs as $idx => $sub) {
        $width = round($sub['vote'] / $big['vote'], 2) * 100;
    ?>
    <div style="display:flex">
        <div style="width:40%;"><?= $idx + 1 ?>. <?= $sub['text'] ?></div>
        <div style="width:60%;display:flex;">
            <div style="height:30px;width:<?= $width ?>%;background:red;"></div><?= $sub['vote'] ?>票(<?= $width ?>%)
        </div>
    </div><br>

    <?php
    }
    ?>
    <div class="ct"><button onclick="location.href='?do=que'">返回</button></div>
</fieldset>