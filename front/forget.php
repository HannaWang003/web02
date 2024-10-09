<fieldset class="tab aut">
    <legend>
        <h2>忘記密碼</h2>
    </legend>
    <h3>請輸入信箱以查詢密碼</h3>
    <input type="text" name="email" id="email" style="width:90%">
    <div id="res"></div>
    <input type="button" value="尋找" onclick="find()">
</fieldset>
<script>
    function find() {
        let email = $('#email').val();
        $.post('./api/find.php?do=user', {
            email
        }, (res) => {
            $('#res').html(res);
        })
    }
</script>