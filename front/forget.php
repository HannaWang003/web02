<fieldset class="tab aut">
    <legend>
        <h2 class="ct">查詢密碼</h2>
    </legend>
    <table style="width:80%" class="aut">
        <tr>
            <td>請輸入信箱以查詢密碼</td>
        </tr>
        <tr>
            <td><input type="text" name="email" id="email" style="width:95%"></td>
        </tr>
        <tr>
            <td id="res"></td>
        </tr>
        <tr>
            <td><button onclick="looking()">尋找</button></td>
        </tr>
    </table>
</fieldset>
<script>
function looking() {
    let email = $('#email').val();
    $.post('./api/looking.php', {
        email
    }, (res) => {
        $('#res').html(res)
    })
}
</script>