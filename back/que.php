<style>
    input[type="text"] {
        width: 80%;
    }
</style>
<fieldset>
    <legend>
        <h3>新增問卷</h3>
    </legend>
    <form action="./api/que.php?do=que" method="post">
        <table class="tab aut">
            <tr>
                <td class="clo">問卷名稱</td>
                <td><input type="text" name="big" id="big"></td>
            </tr>
            <tr>
                <td class="clo" colspan="2"><span>選項</span><input type="text" name="mid[]" class="mid"><input type="button" value="更多" onclick="more(this)"></td>
            </tr>
        </table>
        <div class="ct"><input type="submit" value="新增"><input type="reset" value="清空"></div>
    </form>
</fieldset>
<script>
    function more(dom) {
        let html = `
                <tr>
            <td class="clo" colspan="2"><span>選項</span><input type="text" name="mid[]" class="mid"></td>
        </tr>
        `
        $(dom).parents('tr').before(html);
    }
</script>