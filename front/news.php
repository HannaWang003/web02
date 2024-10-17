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
            <th width="65%">內容</th>
            <th width="10%;"></th>
        </tr>
        <?php
        $div = 5;
        $now = ($_GET['p']) ?? 1;
        $p = $DB->pages($div, $now, ['sh' => 1]);
        $rows = $DB->all(['sh' => 1], "limit {$p['start']},$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td class="clo" style="vertical-align:top"><?= $row['title'] ?></td>
                <td>
                    <div class="s"><?= mb_substr($row['text'], 0, 20) ?></div>
                    <div class="a"><?= nl2br($row['text']) ?></div>
                </td>
                <td style="vertical-align:top">
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
    $('.s').on('click', function() {
        $('.s').slideDown(1000);
        $('.a').hide();
        $(this).hide();
        $(this).siblings('.a').slideDown(1000);
    })
    $('.a').on('click', function() {
        $(this).slideUp();
        $('.s').fadeIn(1000);
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