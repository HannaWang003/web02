<h3>目前位置 : 首頁 > 分類網誌 > <span id="nav"></span></h3>
<div class="tab aut" style="display:flex;align-items:start;">
    <fieldset style="width:20%">
        <legend><b>分類網誌</b></legend>
        <?php
        $types = $Type->all();
        foreach ($types as $idx => $type) {
        ?>
        <div class="type" onclick="getTitle(<?= $idx ?>,<?= $type['id'] ?>)"><?= $type['type'] ?></div>
        <?php
        }
        ?>
    </fieldset>
    <fieldset style="width:80%">
        <legend><b>文章列表</b></legend>
        <div id="article"></div>
    </fieldset>
</div>
<script>
getTitle(0, 1);

function getTitle(eq, type) {
    $.post('./api/get_title.php?do=news', {
        type
    }, (res) => {
        $('#nav').text($('.type').eq(eq).text());
        $('#article').html(res);
    })
}

function getAllArticle(id) {
    $.post('./api/get_all_article.php?do=news', {
        id
    }, (res) => {
        $('#article').html(res);
    })
}
</script>