<?php
$big = $Que->find($_GET['id']);
$mids = $Que->all(['big_id' => $big['id']]);
?>
<fieldset>
    <legend>
        <h2>目前位置 : 首頁 > 問卷調查 > <?= $big['text'] ?></h2>
    </legend>
    <h3 class="tab aut"><?= $big['text'] ?></h3>
    <table class="tab aut">
        <?php
        foreach ($mids as $idx => $mid) {
            if ($big['vote'] == 0) {
                $big['vote'] = 1;
            }
            $width = round($mid['vote'] / $big['vote'], 2) * 100;
        ?>
            <tr>
                <td width="5%"><?= $idx + 1 ?>.</td>
                <td width="31%"><?= $mid['text'] ?></td>
                <td><span
                        style="display:inline-block;height:50px;width:<?= $width ?>%;background:lightgreen;"></span><?= $mid['vote'] ?>票(<?= $width ?>%)
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="tab aut ct"><button onclick="location.href='?do=que'">返回</button></div>
</fieldset>