<div>目前位置 : 首頁 > 分類網誌 > <b id="nav">健康新知</b></div>
<div style="display:flex;align-items:start;width:95%;margin:auto">
    <fieldset style="width:20%">
        <legend>
            <h3>分類網誌</h3>
        </legend>
        <?php
        $pos = $Type->all();
        foreach ($pos as $po) {
        ?>
            <p class="po" data-id="<?= $po['id'] ?>"><?= $po['type'] ?></p>
        <?php
        }
        ?>
    </fieldset>
    <fieldset style="width:80%">
        <legend>
            <h3>文章列表</h3>
        </legend>
        <article></article>
    </fieldset>
</div>
<script>
    $.post('./api/get_po.php?do=news', {
        type: 1
    }, (res) => {
        $('article').html(res);
    })
    $('.po').on("click", function() {
        let text = $(this).text();
        let type = $(this).data('id');
        $('#nav').hide();
        $('article').hide();
        $.post('./api/get_po.php?do=news', {
            type
        }, (res) => {
            $('#nav').text(text).fadeIn(1000);
            $('article').html(res).slideDown(1000);
        })
    })

    function getArticle(dom) {
        $(dom).parents('fieldset').find('p').hide();
        $(dom).find('div').fadeIn(1000);
    }
</script>