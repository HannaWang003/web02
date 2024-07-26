<?php
$rows = $Que->all(['big_id' => $_GET['id']]);
?>
<fieldset>
    <legend>
        <h3>目前位置：首頁 ＞ <?= $Que->find($_GET['id'])['text'] ?></h3>
    </legend>
    <table class="aut" style="width:100%">
        <?php
        foreach ($rows as $idx => $row) {
            $total = $Que->find($_GET['id'])['vote'];
            $width = round($row['vote'] / $total, 2) * 100;
        ?>
        <tr>
            <td width="2%"><?= $idx + 1 ?></td>
            <td width="28%"><?= $row['text'] ?></td>
            <td width="70%" style="display:flex;">
                <div style="background:lightgray;height:30px;width:<?= $width ?>%"></div> <?= $row['vote'] ?>票
                (<?= $width ?>%)
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct"><button onclick="location.href='?do=que'">返回</button></div>
</fieldset>