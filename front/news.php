<div class="nav">目前位置:首頁 > 最新文章</div>
<table style="width:90%;margin:auto;">
    <tr>
        <th style="width:30%">標題</th>
        <th style="width:60%">內容</th>
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
            <td style="padding:10px" class="list" data-id="<?= $row['id'] ?>"><?= $row['title'] ?></td>
            <td style="padding:10px">
                <div id="a<?= $row['id'] ?>"><?= mb_substr($row['text'], 0, 20) ?>...</div>
                <article id="s<?= $row['id'] ?>" style="display:none"><?= nl2br($row['text']) ?></article>
            </td>
            <td>
                <?php
                if (isset($_SESSION['user'])) {
                    if ($Log->find(['acc' => $_SESSION['user'], 'news' => $row['id']])) {
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
<div class="ct">
    <?php
    if ($now - 1 > 0) {
        $prev = $now - 1;
        echo "<a href='?do=news&p=$prev'> < </a>";
    }
    for ($i = 1; $i <= $pages; $i++) {
        $style = ($now == $i) ? "style='font-size:20px;'" : "";
    ?>
        <a href="?do=news&p=<?= $i ?>" <?= $style ?>><?= $i ?></a>
    <?php
    }
    if ($now + 1 <= $pages) {
        $next = $now + 1;
        echo "<a href='?do=news&p=$next'> > </a>";
    }
    ?>
</div>
<script>
    $('.list').on('click', function() {
        let id = $(this).data('id');
        $(`#a${id},#s${id}`).toggle();
    })

    function good(id, good) {
        $.get('./api/good.php', {
            id,
            good
        }, () => {
            location.reload();
        })
    }
</script>