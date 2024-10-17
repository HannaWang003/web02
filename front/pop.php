<style>
    .a {
        display: none;
        padding: 10px;
    }
</style>
<fieldset>
    <legend>
        目前位置 : 首頁 > <b>最新文章區</b>
    </legend>
    <table width="95%" style="margin:auto">
        <tr>
            <th width="25%">標題</th>
            <th width="60%">內容</th>
            <th width="15%;"></th>
        </tr>
        <?php
        $div = 5;
        $now = ($_GET['p']) ?? 1;
        $p = $News->pages($div, $now, ['sh' => 1]);
        $rows = $News->all(['sh' => 1], "limit {$p['start']},$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td class="clo" style="vertical-align:top"><?= $row['title'] ?></td>
                <td class="s">
                    <div><?= mb_substr($row['text'], 0, 20) ?></div>
                    <div class="alerr" style="background:rgba(51,51,51,0.8); color:#FFF; height:300px; width:450px; position:absolute; display:none; z-index:9999; overflow:auto;">
                        <h3><?= $row['title'] ?></h3>
                        <p><?= nl2br($row['text']) ?></p>
                    </div>
                </td>
                <td style="vertical-align:top">
                    <?= $Log->count(['news' => $row['id']]) ?>個人說<span class="good"></span>
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
        <a href="?do=<?= $do ?>&p=<?= $p['prev'] ?>">
            < </a>
                <?php
                for ($i = 1; $i <= $p['pages']; $i++) {
                    $style = ($i == $now) ? "font-size:30px" : "";
                ?>
                    <a href=" ?do=<?= $do ?>&p=<?= $i ?>" style=" <?= $style ?>"><?= $i ?></a>
                <?php
                }
                ?>
                <a href="?do=<?= $do ?>&p=<?= $p['next'] ?>"> > </a>
    </div>
</fieldset>
<script>
    $('.s').hover(function() {
        $('.alerr').hide();
        $(this).find('.alerr').fadeIn(1000);
    }, () => {
        $('.alerr').fadeOut(1000)
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