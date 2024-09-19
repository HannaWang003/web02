<style>
.tag {
    margin: 15px;
}
</style>
<div style="margin:10px 0">目前位置 : 首頁 > 分類網誌 > <span id="nav">健康新知</span></div>
<div style="display:flex">
    <fieldset style="width:25%">
        <legend>分類網誌</legend>
        <div data-type="1" class="tag">健康新知 </div>
        <div data-type="2" class="tag">菸害防治</div>
        <div data-type="3" class="tag">癌症防治</div>
        <div data-type="4" class="tag">慢性病防治</div>
    </fieldset>
    <fieldset style="width:75%">
        <legend>文章列表</legend>
        <div id="tit">
            <?php
            $rows = $News->all(['type' => 1]);
            foreach ($rows as $row) {
            ?>
            <div onclick="getSection(<?= $row['id'] ?>)" style="margin:15px;"><?= $row['title'] ?></div>
            <?php
            }
            ?>
        </div>
        <div id="article"></div>
    </fieldset>
</div>
<script>
$('.tag').on('click', function() {
    let text = $(this).text();
    $('#nav').text(text);
    let type = $(this).data('type');
    $.post('./api/get_title.php?do=news', {
        type,
        sh: 1
    }, (res) => {
        $('#article').hide();
        $('#tit').show();
        $('#tit').html(res);
    })
})

function getSection(id) {
    $.post('./api/get_article.php?do=news', {
        id
    }, (res) => {
        $('#tit').hide();
        $('#article').show();
        $('#article').html(res);
    })
}
</script>