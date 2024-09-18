目前位置:首頁 > 最新文章區
<?php
$div = 5;
$num = $News->count();
$now = ($_GET['p']) ?? 1;
$pages = ceil($num / $div);
$start = ($now - 1) * $div;
$rows = $News->all("limit $start,$div");
?>
<table class="aut">
    <tr>
        <th style="width:30%">標題</th>
        <th style="width:60%">內容</th>
        <th></th>
    </tr>
    <?php
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class="clo"><?= $row['title'] ?></td>
            <td>
                <div onclick="chg(this)"><?= mb_substr($row['text'], 0, 20) ?>...</div>
                <div style="display:none" onclick="chg(this)"><?= $row['text'] ?></div>
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
    echo ($now > 1) ? "<a href='?do=news&p=$prev'> < </a>" : "";
    for ($i = 1; $i <= $pages; $i++) {
        $style = ($i == $now) ? "font-size:20px" : "";
        echo "<a href='?do=news&p=$i' style='$style'>$i</a>";
    }
    echo ($now < $pages) ? "<a href='?do=news&p=$next'> > </a>" : "";

    ?>
</div>
<script>
    function chg(dom) {
        $(dom).parents('td').children('div').toggle();
    }

    function good(news, good) {
        $.post('./api/good.php?do=log', {
            news,
            good
        }, () => {
            location.reload();
        })
    }
</script>