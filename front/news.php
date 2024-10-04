<fieldset>
    <legend>
        <h3>目前位置 : 首頁 > 最新文章區</h3>
    </legend>
    <table>
        <tr>
            <th width="30%">標題</th>
            <th width="60%">內容</th>
            <th></th>
        </tr>
        <?php
        $div = 5;
        $total = $News->count(['sh' => 1]);
        $pages = ceil($total / $div);
        $now = ($_GET['p']) ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(['sh' => 1], "limit $start,$div");
        foreach ($rows as $row) {
        ?>
        <tr>
            <td class="clo"><?= $row['title'] ?></td>
            <td>
                <div class="s"><?= mb_substr($row['text'], 0, 10) ?></div>
                <div class="a" style="display:none">
                    <pre><?= $row['text'] ?></pre>
                </div>
            </td>
            <td style="vertical-align:top">
                <?php
                    if (isset($_SESSION['user'])) {
                        echo ($Log->count(['acc' => $_SESSION['user'], 'news' => $row['id']]) > 0) ? "<button onclick='good(0,{$row['id']})'>收回讚</button>" : "<button onclick='good(1,{$row['id']})'>讚</button>";
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
        $prev = ($now > 1) ? $now - 1 : $now;
        $next = ($now < $pages) ? $now + 1 : $now;
        echo ($now == 1) ? "" : "<a href='?do=news&p=$prev'> < </a>";
        for ($i = 1; $i <= $pages; $i++) {
            $style = ($now == $i) ? "font-size:22px;margin:0 10px" : "";
        ?>
        <a href="?do=news&p=<?= $i ?>" style="<?= $style ?>"><?= $i ?></a>
        <?php
        }
        echo ($now == $pages) ? "" : "<a href='?do=news&p=$next'> > </a>";
        ?>
    </div>
</fieldset>
<script>
$('.s').on('click', function() {
    $('.a').hide();
    $('.s').show();
    $(this).hide();
    $(this).next('.a').show()
})
$('.a').on('click', function() {
    $('.a').hide();
    $(this).hide();
    $(this).prev('.s').show()
})

function good(type, news) {
    $.post('./api/good.php?do=log', {
        type,
        news
    }, () => {
        location.reload();
    })
}
</script>