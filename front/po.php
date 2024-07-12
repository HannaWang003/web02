<div class="nav">目前位置:首頁 > 分類網誌 > <span class="type">健康新知</span></div>
<style>
.types {
    width: 20%;
}

.types a {
    display: block;
}

.lists {
    width: 80%;
}
</style>
<div style="display:flex;">
    <fieldset class="types">
        <legend>分類網誌</legend>
        <a class="type-item" data-type="1">健康新知</a>
        <a class="type-item" data-type="2">菸害防治</a>
        <a class="type-item" data-type="3">癌症防治</a>
        <a class="type-item" data-type="4">慢性病防治</a>
    </fieldset>
    <fieldset class="lists">
        <legend>文章列表</legend>
        <div class="list" style="display:none"></div>
        <div class="article"></div>
    </fieldset>
</div>
<script>
getList(1);
$('.type-item').on('click', function() {
    $('.type').text($(this).text());
    let type = $(this).data('type');
    getList(type);

})

function getList(type) {
    $.get('./api/getList.php', {
        type
    }, (res) => {
        $('.list').html(res);
        $('.article').hide()
        $('.list').show();
    })
}

function getNews(id) {
    $.get('./api/getNews.php', {
        id
    }, (res) => {
        $('.article').html(res);
        $('.list').hide();
        $('.article').show();
    })
}
</script>