<fieldset class="fie">
    <legend><b>目前位置 : 首頁 > 最新文章</b></legend>
    <table>
        <tr>
            <th width="25%">標題</th>
            <th>內容</th>
            <th width="10%"></th>
        </tr>
        <?php
        $div = 5;
        $now = ($_GET['p']) ?? 1;
        $pages = $DB->pages($div, $now, ['sh' => 1]);
        $rows = $DB->all(['sh' => 1], "order by type limit {$pages['start']},$div");
        foreach ($rows as $row) {
        ?>
        <tr>
            <td class="clo"><?= $row['title'] ?></td>
            <td>
                <div class="s"><?= mb_substr($row['text'], 0, 20) ?></div>
                <div class="a" style="display:none;"><?= nl2br($row['text']) ?></div>
            </td>
            <td>
                <?php
                    if (isset($_SESSION['user'])) {
                        echo ($Log->count(['acc' => $_SESSION['user'], 'news' => $row['id']]) > 0) ? "<button onclick='good({$row['id']},0)'>收回讚</button>" : "<button onclick='good({$row['id']},1)'>讚</button>";
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
        echo ($pages['prev'] == $now) ? "" : "<a href='?do=news&p={$pages['prev']}' style='font-size:30px;'> < </a>";
        for ($i = 1; $i <= $pages['pages']; $i++) {
            $style = ($now == $i) ? "font-size:30px;margin:10px;" : "";
            echo "<a href='?do=news&p=$i' style='$style'>$i</a>";
        }
        echo ($pages['next'] == $now) ? "" : "<a href='?do=news&p={$pages['next']}' style='font-size:30px;'> > </a>";
        ?>
    </div>
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