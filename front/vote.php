<?php
$rows = $Que->all(['big_id' => $_GET['id']]);
?>
<fieldset>
    <legend>
        <h3>目前位置：首頁 ＞ <?= $Que->find($_GET['id'])['text'] ?></h3>
    </legend>
    <form action="./api/vote.php" method="post">
        <table class="aut tab">
            <?php
            foreach ($rows as $row) {
            ?>
                <tr>
                    <td width="5%"><input type="radio" name="id" value="<?= $row['id'] ?>"></td>
                    <td><?= $row['text'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>