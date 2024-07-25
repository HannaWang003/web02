目前位置：首頁 ＞ 分類網誌 ＞ <span id="nav">健康新知</span>
<div style="display:flex">
    <fieldset style="width:20%">
        <legend>
            <h3>分類網誌</h3>
        </legend>
        <?php
        $types = $Type->all();
        foreach ($types as $type) {
        ?>
        <div class="type" data-id="<?= $type['id'] ?>"><?= $type['text'] ?></div>
        <?php
        }
        ?>
    </fieldset>
    <fieldset style="width:70%">
        <legend>
            <h3>文章列表</h3>
        </legend>
        <div class="lists"></div>
    </fieldset>
</div>
<script>
getList(1);
$(".type").on('click', function() {
    $('articla').hide();
    let id = $(this).data('id');
    $('#nav').text($(this).text());
    getList(id);
})

function getList(id) {
    $.get('./api/get_list.php', {
        id
    }, (res) => {
        $('.lists').html(res);
    })
}

function getNews(id) {
    $.get('./api/get_news.php', {
        id
    }, (res) => {
        $('.lists').html(res);
    })
}
</script>