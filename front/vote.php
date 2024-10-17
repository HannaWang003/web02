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
    <form action="./api/vote.php?do=que&id=<?= $_GET['id'] ?>" method="post">
        <table>
            <tr>
                <td colspan="2"><b><?= $big['text'] ?></b></td>
            </tr>
            <?php
            $rows = $Que->all(['big_id' => $big['id']]);
            foreach ($rows as $idx => $row) {
            ?>
                <tr>
                    <td><input type="radio" name="id" value="<?= $row['id'] ?>"></td>
                    <td><?= $row['text'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>