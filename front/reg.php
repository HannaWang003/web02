<fieldset>
    <legend>
        <h3>會員註冊</h3>
    </legend>

    <table class="tab aut">
        <tr>
            <td colspan="2"><span style="color:#f00">*請設定您要註冊的帳號及密碼(最長12個字元)</span></td>
        </tr>
        <tr>
            <td class="clo" width="40%">Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc" style="width:90%"></td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw" style="width:90%"></td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2" style="width:90%"></td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email" style="width:90%"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="button" value="註冊" onclick="reg()"><input type="button" value="清除"
                    onclick="clean()"></td>
        </tr>
    </table>
</fieldset>
<script>
function reg() {
    let acc = $('#acc').val();
    let pw = $('#pw').val();
    let pw2 = $('#pw2').val();
    let email = $('#email').val();
    if (acc == "" || pw == "" || pw2 == "" || email == "") {
        alert("不得空白");
    } else {
        if (pw != pw2) {
            alert("密碼錯誤");
        } else {
            $.post('./api/chk_acc.php?do=user', {
                acc
            }, (res) => {
                if (res != 0) {
                    alert("帳號重覆");
                } else {
                    $.post('./api/chk_acc.php?do=user', {
                        acc,
                        pw,
                        email
                    }, (res) => {
                        if (res == 1) {
                            alert("註冊成功，歡迎加入");
                            location.href = "?do=user";
                        } else {
                            alert("error");
                        }
                    })
                }
            })
        }
    }
}

function clean() {
    location.reload();
}
</script>