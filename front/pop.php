<style>
td {
    position: relative;
}

.a {
    position: absolute;
    top: 10px;
    left: 50px;
    width: 450px;
    height: 450px;
    overflow: auto;
    padding: 10px 20px;
    color: #fff;
    background: rgba(0, 0, 0, 0.8);
    z-index: 100;
}
</style>
<fieldset>
    <legend>
        <h3>目前位置 : 首頁 > 人氣文章區</h3>
    </legend>
    <table>
        <tr>
            <th width="30%">標題</th>
            <th width="50%">內容</th>
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
                    <h3 style="color:skyblue;"><?= $row['title'] ?></h3>
                    <pre><?= $row['text'] ?></pre>
                </div>
            </td>
            <td style="vertical-align:top">
                <?php
                    echo $Log->count(['news' => $row['id']]) . "個人說<img src='./icon/02B03.jpg' style='width:20px'>";
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
        echo ($now == 1) ? "" : "<a href='?do=pop&p=$prev'> < </a>";
        for ($i = 1; $i <= $pages; $i++) {
            $style = ($now == $i) ? "font-size:22px;margin:0 10px" : "";
        ?>
        <a href="?do=pop&p=<?= $i ?>" style="<?= $style ?>"><?= $i ?></a>
        <?php
        }
        echo ($now == $pages) ? "" : "<a href='?do=pop&p=$next'> > </a>";
        ?>
    </div>
</fieldset>
<script>
$('.s,.a').hover(function() {
    $(this).siblings('.a').show();
    $(this).show();
}, function() {
    $('.a').hide();
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