<nav>目前位置 : 首頁 > 分類網誌 > <span id="nav">健康新知</span></nav>
<div style="display:flex;width:90%;margin:auto;">
    <fieldset style="width:30%;">
        <legend>
            <h3>分類網誌</h3>
        </legend>
        <?php
        $types = $Type->all();
        foreach ($types as $type) {
        ?>
            <div onclick="getItem(this,<?= $type['id'] ?>)" style="margin:10px 20px;"><?= $type['type'] ?></div>
        <?php
        }
        ?>
    </fieldset>
    <fieldset style="width:70%">
        <legend>
            <h3>文章列表</h3>
        </legend>
        <div id="article">
            <?php
            $titles = $News->all(['type' => 1]);
            foreach ($titles as $tit) {
            ?>
                <div onclick="getArticle(<?= $tit['id'] ?>)" style="margin:10px 20px;"><?= $tit['title'] ?></div>
            <?php
            }
            ?>
        </div>
    </fieldset>
</div>
<script>
    function getItem(dom, type) {
        $.post('./api/get_item.php?do=news', {
            type
        }, (res) => {
            $('#nav').text($(dom).text());
            $('#article').html(res);
        })
    }

    function getArticle(id) {
        $.post('./api/get_po_article.php?do=news', {
            id
        }, (res) => {
            $('#article').html(res);
        })
    }
</script>