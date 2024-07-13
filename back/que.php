<fieldset class="tab aut">
    <legend>新增問卷</legend>
    <form action="./api/que.php" method="post">
        <div><label for="">問卷名稱</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="big" id="big" style="width:50%">
        </div>
        <div id="opt">
            <label for="">選項</label><input type="text" name="sub[]" id="sub" style="width:50%"><input type="button"
                value="更多" onclick="more(this)">
        </div>
        <div><input type="submit" valu="新增"> | <input type="reset" value="清空"></div>
    </form>
</fieldset>
<script>
function more(dom) {
    let html = `
            <div>
        <label for="">選項</label><input type="text" name="sub[]" id="sub" style="width:50%">
    </div>
        `
    $(dom).parent().before(html);
}
</script>