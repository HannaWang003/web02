<fieldset style="width:80%;margin:auto">
    <legend>
        <h3>忘記密碼</h3>
    </legend>
    <div>請輸入信箱以查詢密碼</div>
    <input type="text" name="email" id="email" style="width:80%">
    <div><b id="res" style="color:red"></b></div>
    <button onclick="find()">尋找</button>
</fieldset>
<script>
function find() {
    let email = $('#email').val();
    $.post('./api/email.php?do=user', {
        email
    }, (res) => {
        $('#res').text(res)
    })
}
</script>