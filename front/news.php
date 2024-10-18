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
            <th width="10%"></th>
        </tr>
        <?php
        $div = 5;
        $now = ($_GET['p']) ?? 1;
        $p = $DB->page($div, $now, ['sh' => 1]);
        $rows = $DB->all(['sh' => 1], "limit {$p['start']},$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td style="vertical-align:top;" class="clo"><?= $row['title'] ?></td>
                <td>
                    <div class="s"><?= mb_substr($row['text'], 0, 10) ?>...</div>
                    <div class="a">
                        <pre><?= $row['text'] ?></pre>
                    </div>
                </td>
                <td style="vertical-align:top;">
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
        <a href="?do=news&p=<?= $p['prev'] ?>">
            < </a>
                <?php
                for ($i = 1; $i <= $p['pages']; $i++) {
                    $style = ($now == $i) ? "font-size:30px;" : "";
                ?>
                    <a href="?do=news&p=<?= $i ?>" style="<?= $style ?>"><?= $i ?></a>
                <?php
                }
                ?>
                <a href="?do=news&p=<?= $p['next'] ?>"> > </a>
    </div>
</fieldset>
<script>
    $('.s').on('click', function() {
        $('.a').hide();
        $('.s').show();
        $(this).slideUp(1000);
        $(this).siblings('.a').slideDown(1000);
    })
    $('.a').on('click', () => {
        $('.a').slideUp(1000);
        $('.s').slideDown(1000);
    })

    function good(dom, news, good) {
        $.post('./api/good.php?do=log', {
            news,
            good
        }, (res) => {
            $(dom).parents('td').html(res);
        })
    }
</script>