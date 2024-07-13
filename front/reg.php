<fieldset class="tab aut">
    <legend>會員註冊</legend>
    <span style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</span>
    <table style="width:100%">
        <tr>
            <td>Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc" style="width:80%;"></td>
        </tr>
        <tr>
            <td>Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw" style="width:80%;" maxlength="12"></td>
        </tr>
        <tr>
            <td>Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2" style="width:80%;" maxlength="12"></td>
        </tr>
        <tr>
            <td>Step1:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email" style="width:80%;"></td>
        </tr>
    </table>
    <div><button onclick="reg()">註冊</button><button onclick="clean()">清除</button></div>
</fieldset>
<script>
function clean() {
    $(`input[type="text"],input[type="password"]`).val("");
}

function reg() {
    let pw = $('#pw').val();
    let pw2 = $('#pw2').val();
    let acc = $('#acc').val();
    let email = $('#email').val();
    if (pw == "" || pw2 == "" || acc == "" || email == "") {
        alert("不可空白");
    } else {
        if (pw != pw2) {
            alert("密碼錯誤");
        } else {
            $.post('./api/chk_acc.php', {
                acc
            }, (res) => {
                if (res != 0) {
                    alert("帳號重覆");
                } else {
                    $.post('./api/reg.php', {
                        acc,
                        pw,
                        email
                    }, () => {
                        alert("註冊成功，歡迎加入");
                        location.href = "?do=login"
                    })
                }
            })
        }
    }
}
</script>