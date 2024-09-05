<?php
$rows = $Que->all(['big_id' => $_GET['id']]);
$subject = $Que->find($_GET['id']);
?>
<fieldset class="aut tab">
    <legend>目前位置：首頁 > 問卷調查 > <?= $subject['text'] ?></legend>
    <b><?= $subject['text'] ?></b>
    <?php
    foreach ($rows as $key => $row) {
        $width = round(($row['vote'] / $subject['vote']), 2) * 100;
    ?>
        <div style="margin:10px 5px;display:flex;">
            <div style="width:30%"><?= $key + 1 ?>.<span><?= $row['text'] ?></span></div>
            <div style="height:30px;width:<?= $width ?>%;background:#eee;"></div>
            <div><?= $row['vote'] ?>票(<?= $width ?>%)</div>
        </div>
    <?php
    }
    ?>
    <div class="ct"><input type="button" value="返回" onclick="location.href='?do=que'"></div>
</fieldset>