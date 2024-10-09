<?php
$big = $Que->find($_GET['id']);
$mids = $Que->all(['big_id' => $_GET['id']]);
?>
<fieldset>
    <legend>
        <h3>目前位置 : 首頁 > 問卷調查 > <?= $big['text'] ?></h3>
    </legend>
    <form action="./api/vote.php?do=que" method="post">
        <table>

            <tr>
                <td><b><?= $big['text'] ?></b></td>
            </tr>
            <?php
            foreach ($mids as $idx => $mid) {
                $bt = $big['vote'] ?: 1;
                $width = round($mid['vote'] / $bt, 2) * 100;
            ?>
            <tr>
                <td style="padding:10px 0;"><input type="radio" name="id" value="<?= $mid['id'] ?>"><?= $mid['text'] ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
        <div class="ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>