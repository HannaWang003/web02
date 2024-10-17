<style>
    td {
        padding: 10px;
    }
</style>
<fieldset>
    <legend>
        <h3>新增問卷</h3>
    </legend>
    <table class="tab" style="table-layout:fixed;">
        <tr>
            <td class="clo">問卷名稱</td>
            <td><input type="text" name="big" id="big" style="width:90%;"></td>
        </tr>
        <tr>
            <td colspan="2" class="clo">選項<input type="text" name="mid[]" class="mid" style="width:50%;"><input type="button" value="更多" onclick="more(this)"></td>
        </tr>
    </table>
    <div><input type="submit" value="新增"><input type="reset" value="清空"></div>
</fieldset>
<script>
    function more(dom) {
        let html = `
        <tr>
            <td colspan="2" class="clo">選項<input type="text" name="mid[]" class="mid" style="width:50%;"></td>
        </tr>
`
        $(dom).parents('tr').before(html);
    }
    $('input[type="submit"]').on('click', () => {
        let mids = [];
        $.each($('.mid'), (idx, elm) => {
            mids.push($(elm).val());
        })
        let big = $('#big').val()
        $.post('./api/que.php?do=que', {
            big,
            mids
        }, () => {
            location.reload();
        })
    })
    $('input[type="reset"]').on('click', () => {
        location.reload();
    })
</script>