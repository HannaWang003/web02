<fieldset>
    <legend><b>新增問卷</b></legend>
    <form action="./api/edit_que.php?do=que" method="post">
        <table class="tab aut">
            <tr>
                <td class="clo" width="30%">問卷名稱</td>
                <td><input type="text" name="big" style="width:60%"></td>
            </tr>
            <tr class="clo">
                <td colspan="2"><span>選項</span><input type="text" name="mid[]" style="width:60%"><input type="button"
                        value="更多" onclick="more(this)"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="新增"><input type="reset" value="清空"></td>
            </tr>
        </table>
    </form>
</fieldset>
<script>
    function more(dom) {
        let html = `
                <tr class="clo">
            <td colspan='2'><span>選項</span><input type="text" name="mid[]" style="width:60%"></td>
        </tr>
        `
        $(dom).parents('tr').before(html);
    }
</script>