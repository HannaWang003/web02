<fieldset>
    <legend>
        <h2>新增問卷</h2>
    </legend>
    <form action="./api/que.php?do=que" method="post">
        <table class="tab aut">
            <tr>
                <td class="clo">問卷名稱</td>
                <td><input type="text" name="big" style="width:80%"></td>
            </tr>
            <tr id="more">
                <td class="clo">選項</td>
                <td><input type="text" name="mid[]" style="width:80%"><input type="button" value="更多" onclick="more()">
                </td>
            </tr>
        </table>
        <div class="tab aut"><input type="submit" value="新增"> | <input type="reset" value="清空"></div>
    </form>
</fieldset>
<script>
function more() {
    let html = `
        <tr>
            <td class="clo">選項</td>
            <td><input type="text" name="mid[]" style="width:80%"></td>
        </tr>
        `
    $('#more').before(html);
}
</script>