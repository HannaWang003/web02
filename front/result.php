<?php
$big = $Que->find($_GET['id']);
$mids = $Que->all(['big_id' => $big['id']]);
?>
<style>
    fieldset {
        td:nth-child(1) {
            background: #eee;
            padding: 5px 10px
        }
    }
</style>
<fieldset class="fie aut">
    <legend><b>目前位置 : 首頁 > 問卷調查 > <?= $big['text'] ?></b></legend>
    <h4><?= $big['text'] ?></h4>
    <table class="aut">
        <?php
        foreach ($mids as $idx => $mid) {
            $bigt = $big['vote'] ?: 1;
            $width = round($mid['vote'] / $bigt, 2) * 100;
        ?>
            <tr>
                <td width="30%"><?= $idx + 1 ?> . <?= $mid['text'] ?></td>
                <td>
                    <span
                        style="display:inline-block;height:30px;background:#0fe;width:<?= $width ?>%"></span><?= $mid['vote'] ?>票(<?= $width ?>%)
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct"><input type="button" value="返回" onclick="location.href='?do=que'"></div>
</fieldset>