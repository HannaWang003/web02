<fieldset class="tab aut">
    <legend>
        <h2>會員註冊</h2>
    </legend>
    <h4 style="color:red;width:90%;margin:auto;">*請設定您要註冊的帳號及密碼 ( 最長12個字元 ) </h4>
    <table class="aut" width="90%">
        <tr>
            <td class="clo" width="40%">Step1 : 登入帳號</td>
            <td><input type="text" name="acc" id="acc" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo">Step2 : 登入密碼</td>
            <td><input type="password" name="pw" id="pw" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo">Step3 : 再次輸入密碼</td>
            <td><input type="password" name="pw2" id="pw2" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo">Step4 : 信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email" style="width:90%"></td>
        </tr>
        <tr>
            <td class="l"><button onclick="reg()">註冊</button><button onclick="clean()">清除</button></td>
            <td class="r"><a href="?do=forget">忘記密碼</a> | <a href="?do=reg">尚未註冊</a></td>
        </tr>
    </table>
</fieldset>
<script>
    function clean() {
        location.reload();
    }

    function reg() {
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        let pw2 = $('#pw2').val();
        let email = $('#email').val();
        if (acc == "" || pw == "" || pw2 == "" || email == "") {
            alert("不得空白");
        } else {
            if (pw != pw2) {
                alert("密碼錯誤")
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
                        }, () => {
                            alert("註冊完成，歡迎加入");
                            location.href = "?do=user";
                        })
                    }
                })
            }
        }
    }
</script>