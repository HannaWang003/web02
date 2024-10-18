<style>
    table {
        width: 100%;

        th,
        td {
            padding: 10px;
        }
    }

    table,
    tr,
    th,
    td {
        border-collapse: collapse;
    }

    .sel {
        background: #39c;
        color: #fff;
    }
</style>
<?php
$big = $Que->find($_GET['id']);
?>
<fieldset style="width:95%;">
    <legend>目前位置 : 首頁 > 問卷調查 > <b><?= $big['text'] ?></b>
    </legend>
    <b><?= $big['text'] ?></b>
    <form action="./api/vote.php?do=que" method="post">
        <table class="aut" width="100%">
            <?php
            $rows = $Que->all(['big_id' => $big['id']]);
            foreach ($rows as $idx => $row) {
            ?>
                <tr>
                    <td><input type="radio" name="id" value="<?= $row['id'] ?>"></td>
                    <td><?= $row['text'] ?></td>
                </tr>
            <?php
            }
            ?>
            <input type="hidden" name="big" value="<?= $big['id'] ?>">
        </table>
        <div class="ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>
<script>
    $('input[type="radio"]').on('change', function() {
        $('input[type="radio"]').parents('tr').removeClass('sel');
        if ($(this).prop("checked")) {
            $(this).parents('tr').addClass('sel');;
        }
    })
</script>