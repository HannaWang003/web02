<style>
    #article {
        padding: 10px 20px;

        h3 {
            color: lawngreen;
        }
    }
</style>
<div>目前位置 : 首頁 > 分類網誌 > <b id="nav">健康新知</b></div>
<div style="display:flex;width:90%;margin:auto;align-items:start;">
    <fieldset style="width:20%;">
        <legend><b>分類網誌</b></legend>
        <?php
        $types = $Type->all();
        foreach ($types as $t) {
        ?>
            <p onclick="getTitle(this,<?= $t['id'] ?>)"><?= $t['type'] ?></p>
        <?php
        }
        ?>
    </fieldset>
    <fieldset style="width:80%;">
        <legend><b>文章列表</b></legend>
        <div id="article"></div>
    </fieldset>
</div>
<script>
    $.post('./api/get_po.php?do=news', {
        type: 1
    }, (res) => {
        $('#article').html(res)
    })

    function getTitle(dom, type) {
        $('#nav').text($(dom).text());
        $.post('./api/get_po.php?do=news', {
            type
        }, (res) => {
            $('#article').html(res)
        })
    }

    function getArticle(id) {
        $.post('./api/get_po.php?do=news', {
            id
        }, (res) => {
            $('#article').html(res)
        })
    }
</script>