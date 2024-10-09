<?php
$big = $Que->find($_GET['id']);
$mids = $Que->all(['big_id' => $_GET['id']]);
?>
<fieldset>
    <legend>
        <h3>目前位置 : 首頁 > 問卷調查 > <?= $big['text'] ?></h3>
    </legend>
    <table>

        <tr>
            <td colspan="2"><b><?= $big['text'] ?></b></td>
        </tr>
        <?php
        foreach ($mids as $idx => $mid) {
            $bt = $big['vote'] ?: 1;
            $width = round($mid['vote'] / $bt, 2) * 100;
        ?>
        <tr>
            <td width="32%" style="padding:0 10px;"><?= $idx + 1 ?>.<?= $mid['text'] ?></td>
            <td>
                <span
                    style="display:inline-block;height:30px;width:<?= $width ?>%;background:#0fe"></span><?= $mid['vote'] ?>票(<?= $width ?>%)
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct"><input type="button" value="返回" onclick="location.href='?do=que'"></div>
</fieldset>