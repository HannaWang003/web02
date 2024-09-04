<fieldset class="tab aut">
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table class="aut" width="100%">
        <tr>
            <th width="30%">標題</th>
            <th width="60%">內容</th>
            <th></th>
        </tr>
        <?php
        $div = 5;
        $num = $News->count(['sh' => 1]);
        $pages = ceil($num / $div);
        $now = ($_GET['p']) ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all("limit $start,$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td class="clo"><?= $row['title'] ?></td>
                <td class="text">
                    <div class="list"><?= mb_substr($row['text'], 0, 20) ?>...</div>
                    <div class="list" style="display:none"><?= $row['text'] ?></div>
                </td>
                <td>
                    <?php
                    if (isset($_SESSION['user'])) {
                        if ($Log->count(['news' => $row['id'], 'acc' => $_SESSION['user']]) == 1) {
                    ?>
                            <a data-id="<?= $row['id'] ?>" onclick="good('del',this)">收回讚</a>
                        <?php
                        } else {
                        ?>
                            <a data-id="<?= $row['id'] ?>" onclick="good('add',this)">讚</a>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php
    if ($now > 1) {
        $prev = $now - 1;
        echo "<a href='?do=pop&p=$prev'> < </a>";
    }
    for ($i = 1; $i <= $pages; $i++) {
        $style = ($now == $i) ? "font-size:20px;" : "";
    ?>
        <a href="?do=pop&p=<?= $i ?>" style="<?= $style ?>"><?= $i ?></a>
    <?php
    }
    if ($now < $pages) {
        $next = $now + 1;
        echo "<a href='?do=pop&p=$next'> > </a>";
    }
    ?>
</fieldset>
<script>
    $('.text').on('click', function() {
        $(this).children('.list').toggle();
    })

    function good(type, dom) {
        let news = $(dom).data('id');
        $.post('./api/good.php?do=log', {
            type,
            news
        }, () => {
            location.reload();
        })
    }
</script>