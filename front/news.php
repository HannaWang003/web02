<fieldset>
    <legend>
        <h3>目前位置 : 首頁 > 最新文章區</h3>
    </legend>
    <table class="aut">
        <tr>
            <th width="30%">標題</th>
            <th>內容</th>
            <td width="10%"></td>
        </tr>
        <?php
        $div = 5;
        $now = ($_GET['p']) ?? 1;
        $pages = $DB->pages($div, $now, ['sh' => 1]);
        $rows = $DB->all(['sh' => 1], "order by type limit {$pages['start']},$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td class="clo"><?= $row['title'] ?></td>
                <td>
                    <div class="s"><?= mb_substr($row['text'], 0, 20) ?></div>
                    <div class="a" style="display:none"><?= nl2br($row['text']) ?></div>
                </td>
                <td style="vertical-align:top;">
                    <?php
                    if (isset($_SESSION['user'])) {
                        echo ($Log->count(['news' => $row['id'], 'acc' => $_SESSION['user']]) > 0) ? "<button onclick='good({$row['id']},0)'>收回讚</button>" : "<button onclick='good({$row['id']},1)'>讚</button>";
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <?= ($pages['prev'] == $now) ? "" : "<a href='?do=news&p={$pages['prev']}'> < </a>" ?>
        <?php
        for ($i = 1; $i <= $pages['pages']; $i++) {
            $style = ($i == $now) ? "font-size:24px;margin:10px" : "";
            echo "<a href='?do=news&p=$i' style='$style'>$i</a>";
        }
        ?>
        <?= ($pages['next'] == $now) ? "" : "<a href='?do=news&p={$pages['next']}'> > </a>" ?>
    </div>
</fieldset>
<script>
    $('.s').on('click', function() {
        $('.a').hide();
        $('.s').show();
        $(this).hide();
        $(this).siblings('.a').show()
    })
    $('.a').on('click', function() {
        $(this).hide();
        $(this).siblings('.s').show()
    })

    function good(news, good) {
        $.post('./api/good.php?do=log', {
            news,
            good
        }, (res) => {
            // console.log(res)
            location.reload();
        })
    }
</script>