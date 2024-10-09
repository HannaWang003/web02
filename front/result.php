<?php
$big = $Que->find($_GET['id']);
$mids = $Que->all(['big_id' => $_GET['id']]);
?>
<fieldset>
    <legend><b>目前位置 : 首頁 > 問卷調查 > <?= $big['text'] ?></b></legend>
    <h4><?= $big['text'] ?></h4>
    <table class="tab">
        <?php
        foreach ($mids as $idx => $mid) {
            $bignum = $big['vote'] ?: 1;
            $width = round($mid['vote'] / $bignum, 2) * 100;
        ?>
        <tr>
            <td width="35%" style="padding:1%;"><?= $idx + 1 ?>.<?= $mid['text'] ?></td>
            <td style="padding:3%;">
                <div style="height:30px;width:<?= $width ?>%;background:#0fe"></div><?= $mid['vote'] ?>票(<?= $width ?>%)
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct"><button onclick="location.href='?do=que'">返回</button></div>
</fieldset>