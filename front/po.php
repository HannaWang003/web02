<div>目前位置 : 首頁 > 分類網誌 > <span id="nav">健康新知</span></div>
<div style="display:flex;">
    <fieldset style="width:30%;">
        <legend>分類網誌</legend>
        <?php
        $types = $Type->all();
        foreach ($types as $type) {
        ?>
            <div class='type' data-id='<?= $type['id'] ?>' style="margin:10px 0"><?= $type['type'] ?></div>
        <?php
        }
        ?>
    </fieldset>
    <fieldset style="width:70%">
        <legend>文章列表</legend>
        <div id="tits">
            <?php
            $news = $News->all(['sh' => 1, 'type' => 1]);
            foreach ($news as $n) {
            ?>
                <div onclick="getArticle(<?= $n['id'] ?>)" style="margin:10px 0"><?= $n['title'] ?></div>
            <?php
            }

            ?>
        </div>
        <div id="article" style="display:none"></div>
    </fieldset>
</div>
<script>
    $('.type').on('click', function() {
        let type = $(this).data('id');
        let text = $(this).text();
        $('#nav').text(text);
        $.post('./api/get_title.php?do=news', {
            type,
            sh: 1
        }, (res) => {
            $('#tits').html(res);
            $('#article').hide()
            $('#tits').show();

        })
    })

    function getArticle(id) {
        $.post('./api/get_article.php?do=news', {
            id
        }, (res) => {
            $('#article').html(res);
            $('#tits').hide();
            $('#article').show();
        })
    }
</script>