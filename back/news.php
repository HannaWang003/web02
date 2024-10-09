<fieldset>
    <legend><b>最新文章管理</b></legend>
    <form action="./api/edit_news.php?do=news" method="post">
        <table class="aut tab">
            <tr>
                <th>編號</th>
                <th>標題</th>
                <th>顯示</th>
                <th>刪除</th>
            </tr>
            <?php
            $div = 3;
            $now = ($_GET['p']) ?? 1;
            $pages = $News->pages($div, $now);
            $rows = $News->all("order by type limit {$pages['start']},$div");
            foreach ($rows as $idx => $row) {
            ?>
                <tr>
                    <td class="ct clo" width="8%"><?= $idx + 1 + $pages['start'] ?>.</td>
                    <td class="ct"><?= $row['title'] ?></td>
                    <td class="ct" width="8%"><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>"
                            <?= ($row['sh'] == 1) ? "checked" : "" ?>></td>
                    <td class="ct" width="8%"><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
                </tr>
                <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
            <?php
            }
            ?>
        </table>
        <div class="ct">
            <?= ($pages['prev'] == $now) ? "" : "<a href='?do=news&p={$pages['prev']}'> < </a>" ?>
            <?php
            for ($i = 1; $i <= $pages['pages']; $i++) {
                $style = ($i == $now) ? "font-size:24px;margin:10px" : "";
                echo "<a href='?do=news&p=$i' style='$style'>$i</a>";
            }
            ?>
            <?= ($pages['next'] == $now) ? "" : "<a href='?do=news&p={$pages['next']}'> > </a>" ?>
        </div>
        <div class="ct"><input type="submit" value="確定修改"></div>
    </form>
</fieldset>