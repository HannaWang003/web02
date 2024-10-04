<?php
$big = $Que->find($_GET['id'])
?>
<fieldset>
    <legend>
        <h3>目前位置 : 首頁 > 問卷調查 > <?= $big['text'] ?></h3>
    </legend>
    <form action="./api/vote.php?do=que" method="post">
        <table width="80%">
            <tr>
                <td colspan="2">
                    <h2><?= $big['text'] ?></h2>
                </td>
            </tr>
            <?php
            $mids = $Que->all(['big_id' => $big['id']]);
            foreach ($mids as $mid) {
            ?>
                <tr>
                    <td width="2%" style="padding:10px;"><input type="radio" name="vote" value="<?= $mid['id'] ?>"></td>
                    <td style="padding:10px;"><?= $mid['text'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>