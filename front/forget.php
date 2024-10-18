<style>
    #email {
        width: 90%;
    }
</style>
<fieldset class="aut">
    <legend>
        <h3>忘記密碼</h3>
    </legend>
    <div>請輸入信箱以查詢密碼</div>
    <input type="text" name="email" id="email">
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