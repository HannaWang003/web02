<style>
    table {
        width: 100%;
        table-layout: fixed;

        th,
        td {
            padding: 10px;
        }
    }

    table,
    tr,
    th,
    td {
        border-collapse: collapse;
    }
</style>
<?php
$big = $Que->find($_GET['id']);
?>
<fieldset style="width:95%;">
    <legend>目前位置 : 首頁 > 問卷調查 > <b><?= $big['text'] ?></b>
    </legend>
    <b><?= $big['text'] ?></b>
    <table class="aut" width="100%">
        <?php
        $rows = $Que->all(['big_id' => $big['id']]);
        foreach ($rows as $idx => $row) {
            $total = $big['vote'] ?: 1;
            $width = round($row['vote'] / $total, 2) * 100;
        ?>
            <tr>
                <td><?= $idx + 1 ?> . <?= $row['text'] ?></td>
                <td>
                    <span style="display:inline-block;height:30px;width:<?= $width ?>%;background:lightgreen;"></span>
                    <span><?= $row['vote'] ?>票(<?= $width ?>%)</span>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct"><input type="button" onclick="location.href='?do=que'" value="返回"></div>
</fieldset>