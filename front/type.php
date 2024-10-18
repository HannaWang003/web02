<?php
$rows = $DB->all();
?>
<style>
    #tags {
        display: flex;
        margin-left: 1px;
    }

    .tag {
        border: 1px solid #333;
        border-radius: 10px 10px 0 0;
        padding: 10px 20px;
        background: #eee;
        box-shadow: 3px -3px 3px #aaa;
        margin-left: -1px;
    }

    .active {
        border-bottom-color: #fff;
        background: #fff;
    }

    #article {
        margin-top: -1px;
        padding: 20px 40px;
        border: 1px solid #333;
        box-shadow: 3px -3px 3px #aaa;
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
<div id="article"></div>
<script>
    $('.tag').eq(0).addClass('active');
    $.post('./api/get_type.php?do=type', {
        id: 1
    }, (res) => {
        $('#article').html(res)
    })
    $('.tag').on('click', function() {
        $('#article').hide();
        $('.tag').removeClass('active');
        $(this).addClass('active');
        let id = $(this).data('id');
        $.post('./api/get_type.php?do=type', {
            id
        }, (res) => {
            $('#article').html(res)
            $('#article').slideDown(1000)
        })
    })
</script>