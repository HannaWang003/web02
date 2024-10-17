<fieldset>
    <legend>
        <h3>最新文章管理</h3>
    </legend>
    <form action="./api/news.php?do=news" method="post">
        <table class="tab aut">
            <tr>
                <th width="10%">編號</th>
                <th>標題</th>
                <th width="10%">顯示</th>
                <th width="10%">刪除</th>
            </tr>
            <?php
            $div = 3;
            $now = ($_GET['p']) ?? 1;
            $p = $DB->pages($div, $now);
            $rows = $DB->all("limit {$p['start']},$div");
            foreach ($rows as $idx => $row) {
            ?>
                <tr>
                    <td class="ct clo"><?= $idx + 1 + $p['start'] ?> . </td>
                    <td class="ct"><?= $row['title'] ?></td>
                    <td class="ct"><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?= ($row['sh'] == 1) ? "checked" : "" ?>></td>
                    <td class="ct"><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
                </tr>
                <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
            <?php
            }
            ?>
        </table>
        <div class="ct">
            <a href="?do=<?= $do ?>&p=<?= $p['prev'] ?>">
                < </a>
                    <?php
                    for ($i = 1; $i <= $p['pages']; $i++) {
                        $style = ($i == $now) ? "font-size:30px" : "";
                    ?>
                        <a href=" ?do=<?= $do ?>&p=<?= $i ?>" style=" <?= $style ?>"><?= $i ?></a>
                    <?php
                    }
                    ?>
                    <a href="?do=<?= $do ?>&p=<?= $p['next'] ?>"> > </a>
        </div>
        <div class="ct"><input type="submit" value="確定修改"></div>
    </form>
</fieldset>