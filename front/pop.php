目前位置:首頁 > 最新文章區
<?php
$div = 5;
$num = $News->count(['sh' => 1]);
$now = ($_GET['p']) ?? 1;
$pages = ceil($num / $div);
$start = ($now - 1) * $div;
$rows = $News->all(['sh' => 1], "limit $start,$div");
?>
<table class="aut">
    <tr>
        <th style="width:30%">標題</th>
        <th style="width:50%">內容</th>
        <th>人氣</th>
    </tr>
    <?php
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class="clo"><?= $row['title'] ?></td>
            <td>
                <div class="item"><?= mb_substr($row['text'], 0, 20) ?>...
                    <div
                        style="position:absolute;display:none;width:400px;height:300px;background:rgba(0,0,0,0.8);overflow:auto;color:#fff;padding:10px;">
                        <h3 style="color:lightblue"><?= $row['title'] ?></h3>
                        <?= nl2br($row['text']) ?>
                    </div>
                </div>
            </td>
            <td>
                <?= $Log->count(['news' => $row['id']]) ?>個人說<img src="./icon/02B03.jpg" style="width:20px">
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
    echo ($now > 1) ? "<a href='?do=news&p=$prev'> < </a>" : "";
    for ($i = 1; $i <= $pages; $i++) {
        $style = ($i == $now) ? "font-size:20px" : "";
        echo "<a href='?do=news&p=$i' style='$style'>$i</a>";
    }
    echo ($now < $pages) ? "<a href='?do=news&p=$next'> > </a>" : "";

    ?>
</div>
<script>
    $('.item').hover(function() {
        $(this).children('div').show();
    }, function() {
        $(this).children('div').hide();
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