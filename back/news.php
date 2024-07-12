<fieldset class="tab aut">
    <legend>最新文章管理</legend>
    <form action="./api/edit.php" method="post">
        <table class="tab aut">
            <tr>
                <th width="10%">編號</th>
                <th width="70%">標題</th>
                <th width="10%">顯示</th>
                <th width="10%">刪除</th>
            </tr>
            <?php
            $total = $News->count();
            $div = 3;
            $pages = ceil($total / $div);
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;
            $rows = $News->all("limit $start,$div");
            foreach ($rows as $idx => $row) {
                $chk = ($row['sh'] == 1) ? "checked" : "";
            ?>
                <tr>
                    <td style="text-align:center"><?= $start + $idx + 1 ?>. </td>
                    <td style="text-align:center"><?= $row['title'] ?></td>
                    <td style="text-align:center"><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?= $chk ?>>
                    </td>
                    <td style="text-align:center"><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
                    <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
                    <input type="hidden" name="table" value="news">
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="ct">
            <?php
            if ($now - 1 > 0) {
                $prev = $now - 1;
                echo "<a href='?do=news&p=$prev'> < </a>";
            }
            for ($i = 1; $i <= $pages; $i++) {
                $style = ($now == $i) ? "style='font-size:20px;'" : "";
            ?>
                <a href="?do=news&p=<?= $i ?>" <?= $style ?>><?= $i ?></a>
            <?php
            }
            if ($now + 1 <= $pages) {
                $next = $now + 1;
                echo "<a href='?do=news&p=$next'> > </a>";
            }
            ?>
        </div>
        <div class="ct"><input type="submit" value="確定修改"></div>
    </form>
</fieldset>