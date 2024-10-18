<style>
    .a {
        display: none;
    }
</style>
<fieldset style="width:95%;margin:auto;">
    <legend>目前位置 : 首頁 > <b>最新文章區</b></legend>
    <table class="aut" style="width:100%;">
        <tr>
            <th width="22%">標題</th>
            <th>內容</th>
            <th width="20%"></th>
        </tr>
        <?php
        $div = 5;
        $now = ($_GET['p']) ?? 1;
        $p = $News->page($div, $now, ['sh' => 1]);
        $rows = $News->all(['sh' => 1], "limit {$p['start']},$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td style="vertical-align:top;" class="clo"><?= $row['title'] ?></td>
                <td class="s">
                    <div><?= mb_substr($row['text'], 0, 10) ?>...</div>
                    <div class="alerr" style="padding:10px 20px;background:rgba(51,51,51,0.8); color:#FFF; height:300px; width:450px; position:absolute; display:none; z-index:9999; overflow:auto;">
                        <h3><?= $row['title'] ?></h3>
                        <pre><?= $row['text'] ?></pre>
                    </div>
                </td>
                <td style="vertical-align:top;">
                    <?= $Log->count(['news' => $row['id']]) ?>個人說<span class="good"></span>
                    <?php
                    if (isset($_SESSION['user'])) {
                        echo ($Log->count(['acc' => $_SESSION['user'], 'news' => $row['id']]) == 0) ? "<button onclick='good(this,{$row['id']},1)'>讚</button>" : "<button onclick='good(this,{$row['id']},0)'>收回讚</button>";
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <a href="?do=pop&p=<?= $p['prev'] ?>">
            < </a>
                <?php
                for ($i = 1; $i <= $p['pages']; $i++) {
                    $style = ($now == $i) ? "font-size:30px;" : "";
                ?>
                    <a href="?do=pop&p=<?= $i ?>" style="<?= $style ?>"><?= $i ?></a>
                <?php
                }
                ?>
                <a href="?do=pop&p=<?= $p['next'] ?>"> > </a>
    </div>
</fieldset>
<script>
    $('.s').hover(function() {
        $('.alerr').hide();
        $(this).find('.alerr').slideDown(1000);
    }, () => {
        $('.alerr').hide();
    })

    function good(dom, news, good) {
        $.post('./api/good.php?do=log', {
            news,
            good
        }, () => {
            location.reload();
        })
    }
</script>