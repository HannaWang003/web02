<style>
.fie input[type="text"] {
    width: 80%;
}

input[type="button"] {
    background: #eee;
}

input[type="button"]:hover {
    background: #000;
    color: #fff;
}
</style>
<fieldset class="fie aut">
    <legend><b>問卷管理</b></legend>
    <form action="./api/que.php?do=que" method="post">
        <table class="tab aut">
            <tr>
                <td class="clo">問卷名稱</td>
                <td><input type="text" name="big"></td>
            </tr>
            <tr>
                <td class="clo" colspan="2"><span>選項</span><input type="text" name="mid[]"><input type="button"
                        value="更多" onclick="more(this)"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="新增"><input type="reset" value="清空">
                </td>
            </tr>
        </table>
    </form>
</fieldset>
<script>
function more(dom) {
    let html = `
        <tr>
            <td class="clo" colspan="2"><span>選項</span><input type="text" name="mid[]"></td>
        </tr>
        `
    $(dom).parents('tr').before(html);
}
</script>