<div class="nav">目前位置:首頁 > 人氣文章</div>
<table style="width:90%;margin:auto;">
    <tr>
        <th style="width:25%">標題</th>
        <th style="width:50%">內容</th>
        <th style="width:25%">人氣</th>
    </tr>
    <style>
        .pop {
            display: none;
            background: rgba(51, 51, 51, 0.8);
            color: #FFF;
            width: 300px;
            height: 300px;
            overflow: auto;
            position: fixed;
            z-index: 9999;
            /*以下設定只是美化 */
            padding: 15px;
            border-radius: 10px;
            box-shadow: 2px 2px 10px #999;
        }
    </style>
    <?php
    $total = $News->count(['sh' => 1]);
    $div = 3;
    $pages = ceil($total / $div);
    $now = $_GET['p'] ?? 1;
    $start = ($now - 1) * $div;
    $rows = $News->all(['sh' => 1], " order by good desc limit $start,$div");
    foreach ($rows as $row) {
    ?>
        <tr>
            <td style="padding:10px" class="list" data-id="<?= $row['id'] ?>"><?= $row['title'] ?></td>
            <td style="padding:10px" class="a">
                <div id="a<?= $row['id'] ?>"><?= mb_substr($row['text'], 0, 20) ?>...</div>
                <article id="s<?= $row['id'] ?>" class="pop">
                    <?= nl2br($row['text']) ?></article>
            </td>
            <td style="text-align:center;">
                <?php
                echo $row['good'] . "個人說<img src='./icon/02B03.jpg' style='width:20px;'>";
                if (isset($_SESSION['user'])) {
                    echo " - ";
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
    $('.a').hover(function() {
        $(this).children('article').show();
    }, function() {
        $(this).children('article').hide();
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