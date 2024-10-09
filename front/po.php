<nav>目前位置 : 首頁 > 分類網誌 > <b id="nav"></b></nav>
<div class="aut ta9" style="display:flex;align-items:start;">
    <fieldset style="width:25%">
        <legend>
            <h3>分類網誌</h3>
        </legend>
        <?php
        $types = $Type->all();
        foreach ($types as $t) {
        ?>
        <div class="type" data-id="<?= $t['id'] ?>" style="margin:8px;"><?= $t['type'] ?></div>
        <?php
        }
        ?>
    </fieldset>
    <fieldset style="width:75%">
        <legend>
            <h3>文章列表</h3>
        </legend>
        <article id="article">
            <?php
            $rows = $News->all(['type' => 1,'sh'=>1]);
            foreach ($rows as $row) {
            ?>
            <h4 onclick="getArticle(<?= $row['id'] ?>)"><?= $row['title'] ?></h4>
            <?php
            }
            ?>
        </article>
    </fieldset>
</div>
<script>
$('#nav').text($('.type').eq(0).text())
$('.type').on('click', function() {
    let type = $(this).data('id');
    $.post('./api/get_title.php?do=news', {
        type
    }, (res) => {
        $('#article').html(res);
        $('#nav').text($(this).text())

    })
})


function getArticle(id) {
    $.post('./api/get_po_article.php?do=news', {
        id
    }, (res) => {
        $('#article').html(res)
    })
}
</script>