<fieldset style="width:95%;margin:auto;display:none;">
    <legend>
        <h3>最新文章管理</h3>
    </legend>
    <form action="./api/news.php?do=news" method="post">
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
            $p = $DB->page($div, $now);
            $rows = $DB->all("limit {$p['start']},$div");
            foreach ($rows as $idx => $row) {
            ?>
                <tr>
                    <td class="clo ct"><?= $idx + $p['start'] + 1 ?></td>
                    <td class="ct"><?= $row['title'] ?></td>
                    <td class="ct"><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?= ($row['sh'] == 1) ? "checked" : "" ?>></td>
                    <td class="ct"><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
                    <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="ct">
            <a href="?do=news&p=<?= $p['prev'] ?>">
                < </a>
                    <?php
                    for ($i = 1; $i <= $p['pages']; $i++) {
                        $style = ($now == $i) ? "font-size:30px;" : "";
                    ?>
                        <a href="?do=news&p=<?= $i ?>" style="<?= $style ?>"><?= $i ?></a>
                    <?php
                    }
                    ?>
                    <a href="?do=news&p=<?= $p['next'] ?>"> > </a>
        </div>
        <div class="ct"><input type="submit" value="確定刪除"></div>
    </form>
</fieldset>
<script>
    $(document).ready(() => {
        $('fieldset').fadeIn(1000)
    })
</script>