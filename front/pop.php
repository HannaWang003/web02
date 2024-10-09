<?php
$div = 5;
$now = ($_GET['p']) ?? 1;
$pages = $News->pages($div, $now, ['sh' => 1]);
$rows = $News->all(['sh' => 1], "limit {$pages['start']},$div");
?>
<fieldset>
    <legend>
        <b>目前位置 > 首頁 > 人氣文章區</b>
    </legend>
    <table class="aut" style="width:80%">
        <tr>
            <th width="26%">標題</th>
            <th>內容</th>
            <th>人氣</th>
        </tr>
        <?php
        foreach ($rows as $row) {
        ?>
        <tr>
            <td class="clo"><?= $row['title'] ?></td>
            <td class="s">
                <div><?= mb_substr($row['text'], 0, 10) ?>...</div>
                <div class="alerr"
                    style="background:rgba(51,51,51,0.8); color:#FFF; height:300px; width:450px; position:fixed; display:none; z-index:9999; overflow:auto;padding:10px 20px">
                    <h3><?= $row['title'] ?></h3>
                    <pre><?= $row['text'] ?></pre>
                </div>
            </td>
            <td style="vertical-align:top;">
                <?php
                    $num = $Log->count(['news' => $row['id']]);
                    ?>
                <?= $num ?>個人說<span class="good"></span>
                <?php
                    if (isset($_SESSION['user'])) {
                        if ($Log->count(['acc' => $_SESSION['user'], 'news' => $row['id']]) > 0) {
                    ?>
                <button onclick="good(<?= $row['id'] ?>,0)">收回讚</button>
                <?php
                        } else {
                        ?>
                <button onclick="good(<?= $row['id'] ?>,1)">讚</button>
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
        <a href="?do=pop&p=<?= $pages['prev'] ?>" style="font-size:24px;">
            < </a>
                <?php
                for ($i = 1; $i <= $pages['pages']; $i++) {
                    $style = ($i == $now) ? "font-size:24px;margin:10px;" : "";
                ?>
                <a href="?do=pop&p=<?= $i ?>" style="<?= $style ?>"><?= $i ?></a>
                <?php
                }
                ?>
                <a href="?do=pop&p=<?= $pages['next'] ?>" style="font-size:24px;"> > </a>
    </div>
</fieldset>
<script>
$('.s').hover(function() {
    $(this).children('.alerr').show();
}, () => {
    $('.alerr').hide();
})

function good(news, type) {
    $.post('./api/good.php?do=log', {
        news,
        type
    }, () => {
        location.reload();
    })
}
</script>