<fieldset>
    <legend>
        <h3>會員註冊</h3>
    </legend>
    <table class="tab aut">
        <tr>
            <td colspan="2" style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</td>
        </tr>
        <tr>
            <td class="clo" width="40%">Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc" style="width:80%"></td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw" style="width:80%"></td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2" style="width:80%"></td>
        </tr>
        <tr>
            <td class="clo">Stpe4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email" style="width:80%"></td>
        </tr>
        <tr>
            <td colspan="2"><button onclick="reg()">註冊</button><button onclick="clean()">清除</button></td>
        </tr>
    </table>
    </legend>
</fieldset>
<script>
    function clean() {
        $('input[type="text"],input[type="password"]').val("");
    }

    function reg() {
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        let pw2 = $('#pw2').val();
        let email = $('#email').val();
        if (acc == "" || pw == "" || pw2 == "" || email == "") {
            alert("不可空白");
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
                            alert("註冊成功，歡迎加入")
                            location.href = "?do=login";
                        })
                    }
                }
            })
        }
    }
</script>