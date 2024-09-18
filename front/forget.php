<fieldset>
    <legend>
        <h3>忘記密碼</h3>
    </legend>
    <div>請輸入信箱以查詢密碼</div>
    <div><input type="text" name="email" id="email" style="width:90%;"></div>
    <span id="res"></span>
    <div><button onclick="find()">尋找</button></div>
    </legend>
</fieldset>
<script>
    function find() {
        let email = $('#email').val();
        $.post('./api/find.php?do=user', {
            email
        }, (res) => {
            if (res == 0) {
                $('#res').text("查無此資料")
            } else {
                $('#res').html("您的密碼為:" + res)
            }
        })
    }
</script>