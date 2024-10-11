<fieldset class="fie aut">
    <legend><b>目前位置 : 首頁 > 最新文章</b></legend>
    <table>
        <tr>
            <th width="25%">標題</th>
            <th>內容</th>
            <th width="10%"></th>
        </tr>
        <?php
        $div = 5;
        $now = ($_GET['p']) ?? 1;
        $pages = $News->pages($div, $now, ['sh' => 1]);
        $rows = $News->all(['sh' => 1], "order by type limit {$pages['start']},$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td class="clo"><?= $row['title'] ?></td>
                <td class="s" style="position:relative;">
                    <div><?= mb_substr($row['text'], 0, 20) ?></div>
                    <div class="alerr"
                        style="background:rgba(51,51,51,0.8); color:#FFF; height:300px; width:450px; position:absolute; display:none; z-index:999; overflow:auto;left:10%;padding:10px 20px;">
                        <h3><?= $row['title'] ?></h3>
                        <?= nl2br($row['text']) ?>
                    </div>
                </td>
                <td>
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
        <?php
        echo ($pages['prev'] == $now) ? "" : "<a href='?do=news&p={$pages['prev']}' style='font-size:30px;'> < </a>";
        for ($i = 1; $i <= $pages['pages']; $i++) {
            $style = ($now == $i) ? "font-size:30px;margin:10px;" : "";
            echo "<a href='?do=news&p=$i' style='$style'>$i</a>";
        }
        echo ($pages['next'] == $now) ? "" : "<a href='?do=news&p={$pages['next']}' style='font-size:30px;'> > </a>";
        ?>
    </div>
</fieldset>
<script>
    function good(news, good) {
        $.post('./api/good.php?do=log', {
            news,
            good
        }, (res) => {
            console.log(res)
            location.reload();
        })
    }
    $('.s').hover(function() {
        $(this).children('.alerr').show();
    }, () => {
        $('.alerr').hide();
    })
</script>