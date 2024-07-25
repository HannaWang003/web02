<fieldset>
    <legend>
        <h3>目前位置：首頁 ＞ 最新文章區</h3>
    </legend>
    <table class="aut">
        <tr>
            <th width="30%">標題</th>
            <th width="60%">內容</th>
            <th></th>
        </tr>
        <?php
        $total = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(['sh' => 1], "limit $start,$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td class="clo title" style="padding:10px"><?= $row['title'] ?></td>
                <td>
                    <div class="s" style="padding:10px"><?= mb_substr($row['text'], 0, 20) ?></div>
                    <div class="a" style="display:none;padding:10px;"><?= $row['text'] ?></div>

                </td>
                <td>
                    <?php
                    if (isset($_SESSION['user'])) {
                        echo ($Log->count(['acc' => $_SESSION['user'], 'news_id' => $row['id']]) > 0) ? "<a href='Javascript:good({$row['id']},0)'>收回讚</a>" : "<a href='Javascript:good({$row['id']},1)'>讚</a>";
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div>
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
</fieldset>
<script>
    $('.title').on('click', function() {
        $(this).next('td').children('.s,.a').toggle();
    })

    function good(news_id, good) {
        $.get('./api/good.php', {
            news_id,
            acc: "<?= $_SESSION['user'] ?>",
            good
        }, () => {
            location.reload()
        })
    }
</script>