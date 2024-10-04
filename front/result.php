<?php
$big = $Que->find($_GET['id']);
?>
<fieldset>
    <legend>
        <h3>目前位置 : 首頁 > 問卷調查 > <?= $big['text'] ?></h3>
    </legend>
    <table width="100%">
        <?php
        $mids = $Que->all(['big_id' => $big['id']]);
        foreach ($mids as $idx => $mid) {
            $total = $big['vote'] ?: 1;
            $width = round($mid['vote'] / $total, 2) * 100;
        ?>
            <tr>
                <td width="25%" style="padding:5px 10px;box-sizing:border-box;"><?= ($idx + 1) . $mid['text'] ?></td>
                <td>
                    <span style="display:inline-block;background:lightgreen;height:30px;width:<?= $width ?>%"></span>
                    <?= $mid['vote'] ?>票(<?= $width ?>%)
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct"><button onclick="location.href='?do=que'">返回</button></div>
</fieldset>