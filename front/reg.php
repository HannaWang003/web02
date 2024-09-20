<fieldset>
    <legend>
        <h2>會員註冊</h2>
    </legend>
    <div class="tab aut"><span style="color:red">*請設定您要註冊的帳號及密碼( 最長12個字元 )</span></div>
    <table class="tab aut">
        <tr>
            <td class="clo" width="40%">Step1:登入帳號</td>
            <td width="60%"><input type="text" name="acc" id="acc" style="width:80%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo" width="40%">Step2:登入密碼</td>
            <td width="60%"><input type="password" name="pw" id="pw" style="width:80%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo" width="40%">Step3:再次確認密碼</td>
            <td width="60%"><input type="password" name="pw2" id="pw2" style="width:80%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo" width="40%">Step4:信箱(忘記密碼時使用)</td>
            <td width="60%"><input type="text" name="email" id="email" style="width:80%"></td>
        </tr>
    </table>
    <div class="tab aut"><input type="button" value="註冊"><input type="button" value="清除" onclick="clean()">
    </div>
</fieldset>
<script>
function clean() {
    location.reload();
}
$('input[value="註冊"]').on('click', function() {
    let acc = $('#acc').val();
    let pw = $('#pw').val();
    let pw2 = $('#pw2').val();
    let email = $('#email').val();
    if (acc == "" || pw == "" || pw2 == "" || email == "") {
        alert("不可空白")
    } else {
        $.post('./api/chk_user.php?do=user', {
            acc
        }, (res) => {
            if (res != 0) {
                alert("帳號重覆");
            } else {
                if (pw != pw2) {
                    alert("密碼錯誤")
                } else {
                    $.post('./api/reg.php?do=user', {
                        acc,
                        pw,
                        email
                    }, () => {
                        alert("註冊完成，歡迎加入");
                        location.href = "?do=login";
                    })
                }
            }
        })
    }
})
</script>