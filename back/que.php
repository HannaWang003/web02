<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/que.php?do=que" method="post">
        <table class="tab aut">
            <tr>
                <td class="clo">問卷名稱</td>
                <td><input type="text" name="big" id="" style="width:80%"></td>
            </tr>
            <tr class="clo">
                <td>選項</td>
                <td><input type="text" name="mid[]" id="" style="width:80%"><input type="button" onclick="more(this)"
                        value="更多" />
                </td>
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
            <tr class="clo">
                <td>選項</td>
                <td><input type="text" name="mid[]" id="" style="width:80%"></td>
            </tr>
        `
        $(dom).parents('tr').before(html);
    }
</script>