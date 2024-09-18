<style>
    .tag {
        margin: 20px;
    }

    article {
        display: none;
    }
</style>
目前位置:首頁 > 分類網誌 > <span id="tit">健康新知</span>
<div style="display:flex;align-items:start">
    <fieldset style="width:30%;">
        <legend>分類網誌</legend>
        <div onclick="getList(this,1)" class="tag active">健康新知 </div>
        <div onclick="getList(this,2)" class="tag">菸害防治</div>
        <div onclick="getList(this,3)" class="tag">癌症防治</div>
        <div onclick="getList(this,4)" class="tag">慢性病防治</div>
    </fieldset>
    <fieldset style="width:70%;">
        <legend>文章列表</legend>
        <div id="list"></div>
        <article></article>
    </fieldset>
</div>
<script>
    getList('.active', 1)

    function getList(dom, type) {
        let text = $(dom).text();
        $('#tit').text(text);
        $.post('./api/get_title.php?do=news', {
            type
        }, (res) => {
            $('#list').html(res)
            $('article').hide();
            $('#list').show();
        })
    }

    function getArticle(id) {
        $.post('./api/get_article.php?do=news', {
            id
        }, (res) => {
            $('article').html(res);
            $('#list').hide();
            $('article').show()
        })
    }
</script>