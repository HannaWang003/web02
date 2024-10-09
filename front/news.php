<?php
$rows = $DB->all(['sh' => 1]);
?>
<fieldset>
    <legend>
        <b>目前位置 > 首頁 > 最新文章區</b>
    </legend>
    <table class="aut" style="width:80%">
        <tr>
            <th width="26%">標題</th>
            <th>內容</th>
            <th></th>
        </tr>
        <?php
        foreach ($rows as $row) {
        ?>
            <tr>
                <td class="clo"><?= $row['title'] ?></td>
                <td>
                    <div class="s"><?= mb_substr($row['text'], 0, 10) ?>...</div>
                    <div class="a" style="display:none"><?= $row['text'] ?></div>
                </td>
                <td style="vertical-align:top;">
                    <?php
                    if (isset($_SESSION['user'])) {
                        if ($Log->count(['acc' => $_SESSION['user'], 'news' => $row['id']]) > 0) {
                    ?>
                            <button onclick="good(this,<?= $row['id'] ?>,0)">收回讚</button>
                        <?php
                        } else {
                        ?>
                            <button onclick="good(this,<?= $row['id'] ?>,1)">讚</button>
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
</fieldset>
<script>
    $('.s').on('click', function() {
        $(this).hide();
        $(this).siblings('.a').show();
    })
    $('.a').on('click', function() {
        $(this).hide();
        $(this).siblings('.s').show();
    })

    function good(dom, news, type) {
        $.post('./api/good.php?do=log', {
            news,
            type
        }, () => {
            location.reload();
        })
    }
</script>