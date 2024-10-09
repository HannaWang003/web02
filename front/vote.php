<?php
$big = $Que->find($_GET['id']);
$mids = $Que->all(['big_id' => $_GET['id']]);
?>
<fieldset>
    <legend><b>目前位置 : 首頁 > 問卷調查 > <?= $big['text'] ?></b></legend>
    <h4><?= $big['text'] ?></h4>
    <form action="./api/vote.php?do=que" method="post">
        <table class="tab">
            <?php
            foreach ($mids as $idx => $mid) {
                $bignum = $big['vote'] ?: 1;
                $width = round($mid['vote'] / $bignum, 2) * 100;
            ?>
            <tr>
                <td style="padding:1%;"><input type="radio" name="id" value="<?= $mid['id'] ?>"><?= $mid['text'] ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
        <div class="ct"><button>我要投票</button></div>
    </form>
</fieldset>