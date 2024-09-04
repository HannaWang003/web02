<fieldset class="tab aut">
    <form action="./api/news.php?do=news" method="post">
        <table class="tab aut" style="text-align:center;">
            <tr>
                <th width="10%">編號</th>
                <th>標題</th>
                <th width="10%">顯示</th>
                <th width="10%">刪除</th>
            </tr>
            <?php
            $div = 3;
            $all = $DB->count();
            $pages = ceil($all / $div);
            $now = ($_GET['p']) ?? 1;
            $start = ($now - 1) * $div;
            $rows = $DB->all("limit $start,$div");
            foreach ($rows as $key => $row) {
                $no = $start + 1 + $key;
            ?>
            <tr>
                <td><?= $no ?>.</td>
                <td><?= $row['title'] ?></td>
                <td><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>"
                        <?= ($row['sh'] == 1) ? "checked" : "" ?>></td>
                <td><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
            </tr>
            <input type="hidden" name="id[]" value="<?=$row['id']?>">
            <?php
            }
            ?>
        </table>
        <div class="ct">
            <?php
            $prev = $now - 1;
            $next = $now + 1;
            if ($prev > 0) {
            ?>
            <a href="?do=news&p=<?= $prev ?>">
                < </a>
                    <?php
                }
                for ($i = 1; $i <= $pages; $i++) {
                    $style = ($now == $i) ? "font-size:20px" : "";
                    ?>
                    <a href="?do=news&p=<?= $i ?>" style="<?= $style ?>"><?= $i ?></a>
                    <?php
                }
                if ($next <= $pages) {
                    ?>
                    <a href="?do=news&p=<?= $next ?>"> > </a>
                    <?php
                }
                    ?>
        </div>
        <div class="ct"><button>確定修改</button></div>
    </form>
</fieldset>