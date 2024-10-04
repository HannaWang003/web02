<fieldset>
    <legend>
        <h3>新增問卷</h3>
    </legend>
    <form action="./api/add_que.php?do=que" method="post">
        <table width="90%" style="margin:auto">
            <tr>
                <td class="clo">問卷名稱</td>
                <td><input type="text" name="big" style="width:50%"></td>
            </tr>
            <tr>
                <td colspan="2" class="clo"><span>選項</span><input type="text" name="mid[]" style="width:50%"><input
                        type="button" value="更多" onclick="more(this)"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="新增"> | <input type="reset" value="清空"></td>
            </tr>
        </table>
    </form>
</fieldset>
<script>
function more(dom) {
    let html = `
                    <tr>
                <td colspan="2" class="clo"><span>選項</span><input type="text" name="mid[]" style="width:50%"></td>
            </tr>
        `
    $(dom).parents('tr').before(html);
}
</script>