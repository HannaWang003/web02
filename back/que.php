<fieldset class="tab aut">
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
        <div style="width:60%;">
            <div style="width:100%"><label style="display:inline-block;width:40%;">問卷名稱</label><input type="text"
                    name="big" id="big" style="width:55%"></div>
            <div id="opt"><label>選項</label><input type="text" name="sub[]"><input type="button" onclick="more()"
                    value="更多" /></div>
        </div>
        <div><input type="submit" value="新增"> | <input type="reset" value="清空"></div>
    </form>
</fieldset>
<script>
function more() {
    let html = `
        <div><label>選項</label><input type="text" name="sub[]"></div>
        `
    $('#opt').before(html);
}
</script>