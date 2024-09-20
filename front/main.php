<?php
$rows = $Type->all();
?>
<style>
    #tags {
        display: flex;
        margin-left: 1px;
    }

    .tag {
        margin-left: -1px;
        border: 1px solid #000;
        background: #eee;
        border-radius: 8px 8px 0 0;
        padding: 10px 20px;
    }

    .active {
        border-bottom: 1px solid #fff;
        background: #fff;
    }

    #article {
        border: 1px solid #000;
        padding: 15px 30px;
        margin-top: -1px;
    }
</style>
<div id="tags">
    <?php
    foreach ($rows as $row) {
    ?>
        <div class="tag" data-id="<?= $row['id'] ?>"><?= $row['type'] ?></div>
    <?php
    }
    ?>
</div>
<div id="article">
    <h2 id="tit"><?= $rows[0]['type'] ?></h2>
    <section><?= nl2br($rows[0]['text']) ?></section>
</div>
<script>
    $('.tag').eq(0).addClass('active');
    $('.tag').on('click', function() {
        $('.tag').removeClass('active');
        $(this).addClass('active');
        let id = $(this).data('id');
        let text = $(this).text();
        $('#tit').text(text);
        $.post('./api/main.php?do=type', {
            id
        }, (res) => {
            $("#article").children('section').html(res);
        })

    })
</script>