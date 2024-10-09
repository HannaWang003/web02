<fieldset>
    <legend><b>新增問卷</b></legend>
    <form action="./api/que.php?do=que" method="post" class="tab aut">
        <div style="display:flex">
            <span class="clo" style="width:40%">問卷名稱</span><input type="text" name="big" style="width:40%">
        </div>
        <div style="display:flex;margin-top:10px;" class="clo">
            <span>選項</span><input type="text" name="mid[]" style="width:60%"><input type="button" onclick="more(this)"
                value="更多">
        </div>
        <div><input type="submit" value="新增"><input type="reset" value="清空"></div>
    </form>
</fieldset>
<script>
    function more(dom) {
        let html = `
                <div style="display:flex;margin-top:10px;" class="clo">
            <span>選項</span><input type="text" name="mid[]" style="width:60%">
        </div>
        `
        $(dom).parent('div').before(html);
    }
</script>