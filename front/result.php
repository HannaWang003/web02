<style>
    th,
    td {
        padding: 10px;
    }
</style>
<?php
$big = $Que->find($_GET['id']);
?>
<fieldset>
    <legend>
        目前位置 : 首頁 > 問卷調查 > <b><?= $big['text'] ?></b>
    </legend>
    <table width="100%" style="table-layout:fixed;">
        <tr>
            <td colspan="2"><b><?= $big['text'] ?></b></td>
        </tr>
        <?php
        $rows = $Que->all(['big_id' => $big['id']]);
        foreach ($rows as $idx => $row) {
            $width = round($row['vote'] / ($big['vote'] ?: 1), 2) * 100;
        ?>
            <tr>
                <td><?= $row['text'] ?></td>
                <td style="display:flex;">
                    <div style="background:#0fe;height:30px;width:<?= $width ?>%"></div><?= $row['vote'] ?>票(<?= $width ?>%)
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct"><input type="button" onclick="location.href='?do=que'" value="返回"></div>
</fieldset>