<fieldset class="fie aut">
    <legend><b>最新文章管理</b></legend>
    <form action="./api/edit_news.php?do=news" method="post">
        <table class="ct aut tab">
            <tr>
                <th width="8%">編號</th>
                <th>標題</th>
                <th width="8%">顯示</th>
                <th width="8%">刪除</th>
            </tr>
            <?php
            $div = 3;
            $now = ($_GET['p']) ?? 1;
            $pages = $DB->pages($div, $now);
            $rows = $DB->all("limit {$pages['start']},$div");
            foreach ($rows as $idx => $row) {
            ?>
                <tr>
                    <td class="clo"><?= $idx + $pages['start'] + 1 ?>.</td>
                    <td>
                        <?= $row['title'] ?>
                    </td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?= ($row['sh'] == 1) ? "checked" : "" ?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?= $row['id'] ?>">
                    </td>
                </tr>
                <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
            <?php
            }
            ?>
        </table>
        <div class="ct">
            <?php
            echo ($pages['prev'] == $now) ? "" : "<a href='?do=news&p={$pages['prev']}' style='font-size:30px;'> < </a>";
            for ($i = 1; $i <= $pages['pages']; $i++) {
                $style = ($now == $i) ? "font-size:30px;margin:10px;" : "";
                echo "<a href='?do=news&p=$i' style='$style'>$i</a>";
            }
            echo ($pages['next'] == $now) ? "" : "<a href='?do=news&p={$pages['next']}' style='font-size:30px;'> > </a>";
            ?>
        </div>
        <div class="ct"><input type="submit" value="確定修改"></div>
    </form>
</fieldset>
<script>
    function good(news, good) {
        $.post('./api/good.php?do=log', {
            news,
            good
        }, (res) => {
            console.log(res)
            location.reload();
        })
    }
    $('.s').on('click', function() {
        $('.a').hide();
        $('.s').show();
        $(this).hide();
        $(this).siblings('.a').show();
    })
    $('.a').on('click', function() {
        $('.a').hide();
        $('.s').show();
    })
</script>