<div>目前位置 : 首頁 > 最新文章區</div>
<table class="tab aut">
    <tr>
        <th width="20%">標題</th>
        <th width="70%">內容</th>
        <th></th>
    </tr>
    <?php
    $div = 5;
    $num = $News->count(['sh' => 1]);
    $pages = ceil($num / $div);
    $now = ($_GET['p']) ?? 1;
    $start = ($now - 1) * $div;
    $rows = $News->all(['sh' => 1], "limit $start,$div");
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class='clo'><?= $row['title'] ?></td>
            <td>
                <div class='s'>
                    <?= mb_substr($row['text'], 0, 20) ?>
                </div>
                <div class='a' style="display:none;">
                    <pre>
                   <?= $row['text'] ?> 
                </pre>
                </div>

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
    $prev = $now - 1;
    $next = $now + 1;
    echo ($now > 1) ? "<a href='?do=news&p=$prev' style='padding:5px;'> < </a>" : "";
    for ($i = 1; $i <= $pages; $i++) {
        $style = ($now == $i) ? "font-size:20px" : "";
    ?>
        <a href="?do=news &p=<?= $i ?>" style="padding:5px;<?= $style ?>"><?= $i ?></a>
    <?php
    }
    echo ($now < $pages) ? "<a href='?do=news&p=$next' style='padding:5px;'> > </a>" : "";
    ?>
</div>
<script>
    $('.s').on('click', function() {
        $('.a').hide();
        $(this).hide();
        $(this).siblings('.a').show();
    })
    $('.a').on('click', function() {
        $('.a').hide();
        $('.s').show();
    })

    function good(news, good) {
        $.post('./api/good.php?do=log', {
            news,
            good
        }, () => {
            location.reload();
        })
    }
</script>