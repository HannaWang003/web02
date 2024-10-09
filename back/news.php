<fieldset>
    <legend><b>最新文章管理</b></legend>
    <form action="./api/edit.php?do=<?= $do ?>" method="post">
        <table class="tab aut">
            <tr>
                <th>編號</th>
                <th>標題</th>
                <th>顯示</th>
                <th>刪除</th>
            </tr>
            <?php
            $div = 3;
            $now = ($_GET['p']) ?? 1;
            $pages = $DB->pages($div, $now);
            $rows = $DB->all("limit {$pages['start']},$div");
            foreach ($rows as $idx => $row) {
            ?>
                <tr>
                    <td class="ct clo"><?= $pages['start'] + $idx + 1 ?>.</td>
                    <td class="ct"><?= $row['title'] ?></td>
                    <td class="ct"><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>"
                            <?= ($row['sh'] == 1) ? "checked" : "" ?>></td>
                    <td class="ct"><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
                    <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="ct">
            <?php
            if ($pages['prev'] != $now) {
            ?>
                <a href="?do=news&p=<?= $pages['prev'] ?>" style="font-size:20px">
                    < </a>
                    <?php
                }
                for ($i = 1; $i <= $pages['pages']; $i++) {
                    $style = ($i == $now) ? "font-size:24px;margin:10px" : "";
                    ?>
                        <a href="?do=news&p=<?= $i ?>" style="<?= $style ?>"><?= $i ?></a>
                    <?php
                }
                    ?>
                    <?php
                    if ($pages['next'] != $now) {
                    ?>
                        <a href="?do=news&p=<?= $pages['next'] ?>" style="font-size:20px"> > </a>
                    <?php
                    }
                    ?>
        </div>
        <div class="ct"><input type="submit" value="確定修改"></div>
    </form>
</fieldset>