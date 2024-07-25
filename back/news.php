<fieldset>
    <legend>
        <h2>最新文章管理</h2>
    </legend>
    <form action="./api/edit_news.php" method="post">
        <table class="ct aut" style="width:90%;">
            <tr>
                <th>編號</th>
                <th>標題</th>
                <th>顯示</th>
                <th>刪除</th>
            </tr>
            <?php
            $total = $News->count();
            $div = 3;
            $pages = ceil($total / $div);
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;
            $rows = $News->all("limit $start,$div");
            foreach ($rows as $idx => $row) {
                $idx = $start + $idx + 1;
            ?>
            <tr>
                <td class="clo"><?= $idx ?>.</td>
                <td><?= $row['title'] ?></td>
                <td><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>"
                        <?= ($row['sh'] == 1) ? "checked" : "" ?>></td>
                <td><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
            </tr>
            <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
            <?php
            }
            ?>
        </table>
        <div class="ct">
            <?php
            $prev = $now - 1;
            if ($prev >= 1) {
                echo "<a href='?do=news&p=$prev'> < </a>";
            }
            for ($i = 1; $i <= $pages; $i++) {
                $style = ($i == $now) ? "style='font-size:20px;color:skyblue'" : "";
            ?>
            <a href="?do=news&p=<?= $i ?>" <?= $style ?>><?= $i ?></a>
            <?php
            }
            $next = $now + 1;
            if ($next <= $pages) {
                echo "<a href='?do=news&p=$next'> > </a>";
            }
            ?>
        </div>
        <div class="ct"><input type="submit" value="確定修改"></div>
    </form>
</fieldset>