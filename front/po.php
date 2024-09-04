<div>目前位置：首頁 > 分類網誌 > <span id="nav">健康新知</span></div>
<div style="display:flex;align-items:start;">
    <fieldset style="width:20%;">
        <legend>分類網誌</legend>
        <div class="title" data-type="1" style="margin:10px;">健新新知</div>
        <div class="title" data-type="2" style="margin:10px;">菸害防治</div>
        <div class="title" data-type="3" style="margin:10px;">癌症防治</div>
        <div class="title" data-type="4" style="margin:10px;">慢性病防治</div>
    </fieldset>
    <fieldset style="width:80%">
        <legend>文章列表</legend>
        <div id="list"></div>
        <div id="article"></div>
    </fieldset>
</div>
<script>
getList(1)
$('.title').on('click', function() {
    let type = $(this).data('type');
    let text = $(this).text();
    $('#nav').text(text);
    getList(type);
})

function getList(type) {
    $.post('./api/po.php?do=news', {
        type
    }, (res) => {
        $('#article').hide();
        $('#list').show();
        $('#list').html(res)
    })
}

function getNews(id) {
    $.post('./api/po_news.php?do=news', {
        id
    }, (res) => {
        $('#list').hide();
        $('#article').show();
        $('#article').html(res)
    })
}
</script>