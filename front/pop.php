<fieldset>
    <legend>
        <h3>目前位置 : 首頁 > 人氣文章區</h3>
    </legend>
    <table class="aut">
        <tr>
            <th>標題</th>
            <th>內容</th>
            <td>人氣</td>
        </tr>
        <?php
        $div = 5;
        $now = ($_GET['p']) ?? 1;
        $pages = $News->pages($div, $now, ['sh' => 1]);
        $rows = $News->all(['sh' => 1], "order by type limit {$pages['start']},$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td class="clo" width="30%"><?= $row['title'] ?></td>
                <td class="s" style="position:relative;">
                    <div><?= mb_substr($row['text'], 0, 20) ?></div>
                    <div class="alerr"
                        style="background:rgba(51,51,51,0.8); color:#FFF; height:300px; width:450px; position:absolute; display:none; z-index:9999; overflow:auto;padding:5px 10px">
                        <h3><?= $row['title'] ?></h3>
                        <pre><?= $row['text'] ?></pre>
                    </div>
                </td>
                <td>
                    <?php
                    echo $Log->count(['news' => $row['id']]) . "個人說<span class='good'></span>";
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
    $('.s').hover(function() {
        $(this).children('.alerr').show();
    }, function() {
        $('.alerr').hide();
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