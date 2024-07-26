<style>
#tags {
    display: flex;
    margin-left: 1px;

}

.tag {
    width: 100px;
    padding: 10px;
    border: 1px solid #000;
    margin-left: -1px;
    text-align: center;
    background: #eee;
    border-radius: 10px 10px 0 0;
}

.active {
    background: #fff;
    border-bottom: 1px solid #fff;
}

article {
    margin-top: -1px;
    border: 1px solid #000;
}
</style>
<div id="tags">
    <?php
    $tags = $Type->all();
    foreach ($tags as $idx => $tag) {
    ?>
    <div class="tag" data-id="<?= $tag['id'] ?>"><?= $tag['text'] ?></div>
    <?php
    }
    ?>

</div>
<article style="padding:10px;"><?= $tags[0]['article'] ?></article>
<script>
$('.tag').eq(0).addClass('active');
$('.tag').on('click', function() {
    let id = $(this).data('id');
    console.log(id);
    $('.tag').removeClass('active');
    $(this).addClass('active');
    $.get('./api/get_article.php', {
        id
    }, (res) => {
        $('article').html(res)
    })
})
</script>