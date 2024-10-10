<fieldset class="fie_acc">
    <legend><b>會員註冊</b></legend>
    <table class="tab aut">
        <tr>
            <td colspan="2"><b style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</b></td>
        </tr>
        <tr>
            <td class="clo" width="50%">Step1 : 登入帳號</td>
            <td><input type="text" name="acc" id="acc" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo" width="50%">Step2 : 登入密碼</td>
            <td><input type="password" name="pw" id="pw" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo" width="50%">Step3 : 再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo" width="50%">Step4 : 信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email" style="width:90%"></td>
        </tr>
        <tr>
            <td class="l">
                <input type="button" value="註冊" onclick="reg()"><input type="button" value="清除" onclick="clean()">
            <td class="r"></td>
            </td>
        </tr>
    </table>
</fieldset>
<script>
function reg() {
    let acc = $('#acc').val();
    let pw = $('#pw').val();
    let pw2 = $('#pw2').val();
    let email = $('#email').val();
    let values = [acc, pw, pw2, email];
    if (values.some(value => value.trim() == "")) {
        alert("不得空白");
    } else {
        if (pw != pw2) {
            alert("密碼錯誤");
        } else {
            $.post('./api/chk_acc.php?do=user', {
                acc
            }, (res) => {
                if (res >= 1) {
                    alert("帳號重複");
                } else {
                    $.post('./api/chk_acc.php?do=user', {
                        acc,
                        pw,
                        email
                    }, (res) => {
                        console.log(res);
                        alert("註冊完成，歡迎加入");
                        location.href = "?do=user"
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