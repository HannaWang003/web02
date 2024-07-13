<?php
$table = $_GET['do'];
$DB = ${ucfirst($table)};
?>
<fieldset class="tab aut">
    <legend>目前位置: 首頁 > 最新文章區</legend>
    <table class="aut">
        <tr>
            <th>標題</th>
            <th>內容</th>
            <th></th>
        </tr>
        <?php
        $total = $DB->count();
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $DB->all(['sh' => 1], "limit $start,$div");
        foreach ($rows as $row) {
        ?>
        <tr>
            <td class="title" style="width:40%;background:#eee;"><?= $row['title'] ?></td>
            <td>
                <div><?= mb_substr($row['text'], 0, 25) ?></div>
                <article style="display:none"><?= nl2br($row['text']) ?></article>
            </td>
            <td style="width:10%;">
                <?php
                    if(isset($_SESSION['user'])){
                    if ($Log->count(['user' => $_SESSION['user'], 'news' => $row['id']]) > 0) {
                    ?>
                <a href="Javascript:good(<?= $row['id'] ?>,'del')">收回讚</a>
                <?php
                    } else {
                    ?>
                <a href="Javascript:good(<?= $row['id'] ?>,'add')">讚</a>
                <?php
                    }
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
        if ($now - 1 > 0) {
            $prev = $now - 1;
            echo "<a href='?do=$table&p=$prev'> < </a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $style = ($now == $i) ? "style='font-size:20px;color:darkblue'" : "";
            echo "<a href='?do=$table&p=$i' $style>$i</a>";
        }
        if ($now + 1 <= $pages) {
            $next = $now + 1;
            echo "<a href='?do=$table&p=$next'> > </a>";
        }
        ?>
    </div>
</fieldset>
<script>
$('.title').on('click', function() {
    $(this).siblings().children('div,article').toggle();
})

function good(id, type) {
    $.get('./api/good.php', {
        id,
        type
    }, () => {
        location.reload();
    })
}
</script>