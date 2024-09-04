<fieldset class="tab aut">
    <legend>新增問卷</legend>
    <form action="./api/add_que.php?do=que" method="post">
        <div><span class="clo" style="padding:5px 100px 5px 5px;">問卷名稱</span><input type="text" name="big"></div>
        <div><span class="clo" id="sub" style="padding:5px;margin-top:5px">選項</span><input type="text" name="sub[]"
                id=""><input type="button" value="更多" onclick="more()"></div>
        <div><input type="submit" value="新增">|<input type="reset" value="清空"></div>
    </form>
</fieldset>
<script>
function more() {
    let html = `
        <div><span class="clo" style="padding:5px;margin-top:5px">選項</span><input type="text" name="sub[]"
                id=""></div>
        `
    $('#sub').before(html)
}
</script>