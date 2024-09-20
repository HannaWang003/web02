<?php

?>
<fieldset>
    <legend>
        <h2>忘記密碼</h2>
    </legend>
    <div class="tab">
        <div>請輸入信箱以查詢密碼</div>
        <div><input type="text" name="email" id="email" style="width:80%"></div>
        <span id="res"></span>
        <div><input type="button" value="尋找" onclick="find();"></div>
    </div>
</fieldset>
<script>
function find() {
    let email = $('#email').val();
    $.post('./api/find.php?do=user', {
        email
    }, (res) => {
        $('#res').html(res)
    })
}
</script>