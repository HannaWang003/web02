<fieldset class="tab aut">
    <legend>會員註冊</legend>
    <span style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</span>
    <table class="tab aut">
        <tr>
            <td style="width:50%">Step1:登入帳號</td>
            <td style="width:50%"><input type="text" name="acc" id="acc" style="width:90%"></td>
        </tr>
        <tr>
            <td style="width:50%">Step2:登入密碼</td>
            <td style="width:50%"><input type="password" name="pw" id="pw" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td style="width:50%">Step3:再次確認密碼</td>
            <td style="width:50%"><input type="password" name="pw2" id="pw2" style="width:90%"></td>
        <tr>
            <td style="width:50%">Step4:信箱(忘記密碼時使用)</td>
            <td style="width:50%"><input type="text" name="pw" id="email" style="width:90%"></td>
        </tr>
        <tr>
            <td colspan="2">
                <button onclick="reg()">註冊</button><button onclick="clean()">清除</button>
            </td>
        </tr>
    </table>
</fieldset>
<script>
    function clean() {
        $('input[type="text"],input[type="password"]').val("")
    }

    function reg() {
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        let pw2 = $('#pw2').val();
        let email = $('#email').val();
        if (acc == "" || pw == "" || pw2 == "" || email == "") {
            alert("不可空白");
        } else {
            if (pw != pw2) {
                alert("密碼錯誤");
            } else {
                $.post('./api/chk_acc.php', {
                    acc
                }, (res) => {
                    if (res == 0) {
                        $.post('./api/reg.php', {
                            acc,
                            pw,
                            email
                        }, () => {
                            alert("註冊完成，歡迎加入");
                            location.href = "?do=login";
                        })
                    } else {
                        alert("帳號重覆");
                    }
                })
            }
        }
    }
</script>