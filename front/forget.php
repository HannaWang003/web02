<fieldset class="tab aut">
    <legend>
        <h3>忘記密碼</h3>
    </legend>
    <div>請輸入信箱以查詢密碼</div>
    <input type="text" name="email" id="email" style="width:90%;">
    <div id="res" style="color:red"></div>
    <button onclick="find()">尋找</button>
</fieldset>
<script>
function find() {
    let email = $('#email').val();
    $.post('./api/chk_email.php?do=user', {
        email
    }, (res) => {
        $('#res').text(res);
    })
}
</script>