<style>
.pop {
    width: 400px;
    height: 400px;
    overflow: auto;
    padding: 10px;
    border-radius: 5px;
    background: rgba(0, 0, 0, 0.8);
    color: #fff;
    display: none;
    position: fixed;
    z-index: 999;
    box-shadow: 0 0 #000;
}
</style>
<fieldset class="tab aut">
    <legend>目前位置: 首頁 > 人氣文章區</legend>
    <table class="aut">
        <tr>
            <th>標題</th>
            <th>內容</th>
            <th></th>
        </tr>
        <?php
        $total = $News->count();
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(['sh' => 1], "order by good desc limit $start,$div");
        foreach ($rows as $row) {
        ?>
        <tr>
            <td style="width:30%;background:#eee;text-align:center;"><?= $row['title'] ?></td>
            <td>
                <div class="title"><?= mb_substr($row['text'], 0, 25) ?>
                    <article class="pop">
                        <h3 style="color:aqua;"><?= $row['title'] ?></h3>
                        <?= nl2br($row['text']) ?>
                    </article>
                </div>
            </td>
            <td style="width:30%;">
                <?php
                    echo $News->find($row['id'])['good'] . "個人說<img src='./icon/02B03.jpg' style='width:20px;'>"
                    ?>
                <?php
                    if (isset($_SESSION['user'])) {
                        echo "-";
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
            echo "<a href='?do=pop&p=$prev'> < </a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $style = ($now == $i) ? "style='font-size:20px;color:darkblue'" : "";
            echo "<a href='?do=pop&p=$i' $style>$i</a>";
        }
        if ($now + 1 <= $pages) {
            $next = $now + 1;
            echo "<a href='?do=pop&p=$next'> > </a>";
        }
        ?>
    </div>
</fieldset>
<script>
$('.title').hover(function() {
    $('.pop').hide();
    $(this).children('.pop').show();
}, () => {
    $('.pop').hide();
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