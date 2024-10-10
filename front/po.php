<style>
.type {
    padding: 3px;
}

.clo:hover {
    background: #eee;
}

#article {
    padding: 10px 20px;
}
</style>
<nav><b>目前位置 : 首頁 > 分類網誌 > <span id="nav">健康促進網</span></b></nav>
<div class="aut" style="display:flex;align-items:start;">
    <fieldset class="fie" style="width:25%">
        <legend><b>分類網誌</b></legend>
        <?php
        $types = $Type->all();
        foreach ($types as $t) {
        ?>
        <div class="type" data-id="<?= $t['id'] ?>"><?= $t['type'] ?></div>
        <?php
        }
        ?>
    </fieldset>
    <fieldset class="fie" style="width:75%">
        <legend><b>文章列表</b></legend>
        <article id="article"></article>
    </fieldset>
</div>
<script>
getTitle(1);
$('.type').on('click', function() {
    let id = $(this).data('id');
    let text = $(this).text();
    $('#nav').text(text);
    getTitle(id);
})

function getTitle(type) {
    $.post('./api/get_title.php?do=news', {
        type
    }, (res) => {
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