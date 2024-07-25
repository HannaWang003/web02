<style>
    .big,
    .mid {
        width: 80%;
        margin: 5px 10px;
    }

    span {
        display: inline-block;
    }

    .big>span:nth-child(1) {
        width: 40%;
    }

    .big>span:nth-child(2) {
        width: 55%;
    }

    .mid>span:nth-child(2) {
        width: 55%;
    }
</style>
<fieldset>
    <legend>
        <h2>新增問卷</h2>
    </legend>
    <form action="./api/que.php" method="post">
        <div class="big"><span class="clo">問卷名稱</span><span><input type="text" name="big" id="big" style="width:90%"></span></div>
        <div class="mid"><span class="clo">選項</span><span><input type="text" name="mid[]" style="width:90%"></span><input type="button" value="更多" onclick="more(this)"></div>

        <div class="ct"><input type="submit" value="新增"><input type="reset" value="清空"></div>
    </form>
</fieldset>
<script>
    function more(dom) {
        let html = `
<div class="mid"><span class="clo">選項</span><span><input type="text" name="mid[]"
                    style="width:90%"></span></div>
        `
        $(dom).parents('.mid').before(html);

    }
</script>