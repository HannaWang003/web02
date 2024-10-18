<fieldset style="width:80%;" class="aut">
    <legend>
        <h3>會員註冊</h3>
    </legend>
    <table style="width:80%;margin:auto;table-layout:fixed;">
        <tr>
            <td colspan="2" style="color:#f00">*請設定您要註冊的帳號及密碼( 最長12個字元 )</td>
        </tr>
        <tr>
            <td class="clo">Step1 : 登入帳號</td>
            <td><input type="text" name="acc" id="acc" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo">Step2 : 登入密碼</td>
            <td><input type="password" name="pw" id="pw" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo">Step3 : 再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo">Step4 : 信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email" style="width:90%"></td>
        </tr>
        <tr>
            <td class="l" colspan="2"><button onclick="reg()">註冊</button><button onclick="clean()">清除</button></td>
        </tr>
    </table>
</fieldset>
<script>
    function clean() {
        $('#acc,#pw,#pw2,#email').val("");
    }

    function reg() {
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        let pw2 = $('#pw2').val();
        let email = $('#email').val();
        if (acc == "" || pw == "" || pw2 == "" || email == "") {
            alert("不可空白");
        } else {
            $.post('./api/user.php?do=user', {
                acc
            }, (res) => {
                if (res != 0) {
                    alert("帳號重覆");
                } else {
                    if (pw != pw2) {
                        alert("密碼錯誤")
                    } else {
                        $.post('./api/user.php?do=user', {
                            acc,
                            pw,
                            email
                        }, () => {
                            alert("註冊成功，歡迎加入");
                            location.href = "index.php?do=user";
                        })
                    }
                }
            })
        }
    }
</script>