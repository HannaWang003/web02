<style>
.s {
    position: relative;
}

.a {
    background: rgba(0, 0, 0, 0.8);
    color: #fff;
    padding: 10px 20px;
    position: absolute;
    display: none;
    width: 400px;
    height: 300px;
    overflow: auto;
    z-index: 100;
}
</style>
<div>目前位置 : 首頁 > 人氣文章區</div>
<table>
    <tr>
        <th width="20%">標題</th>
        <th width="60%">內容</th>
        <th>人氣</th>
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
                <div class='a'>
                    <h3 style="color:lightseagreen"><?=$row['title']?></h3>
                    <pre>
                            <?= $row['text'] ?> 
                        </pre>
                </div>
            </div>
        </td>
        <td>
            <?php
                echo $Log->count(['news' => $row['id']]) . "個人說<img src='./icon/02B03.jpg' style='width:20px;'/> - ";
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
    echo ($now > 1) ? "<a href='?do=pop&p=$prev' style='padding:5px;'> < </a>" : "";
    for ($i = 1; $i <= $pages; $i++) {
        $style = ($now == $i) ? "font-size:20px" : "";
    ?>
    <a href="?do=pop&p=<?= $i ?>" style="padding:5px;<?= $style ?>"><?= $i ?></a>
    <?php
    }
    echo ($now < $pages) ? "<a href='?do=pop&p=$next' style='padding:5px;'> > </a>" : "";
    ?>
</div>
<script>
$('.s').hover(function() {
    console.log($(this))
    $(this).children('.a').show();
}, () => {
    $('.a').hide();
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