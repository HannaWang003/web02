<fieldset class="tab aut">
    <legend>
        <h2 class="ct">會員註冊</h2>
    </legend>
    <table style="width:90%" class="aut">
        <tr>
            <td colspan="2" style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</td>
        </tr>
        <tr>
            <td>Stpe１：帳號</td>
            <td><input type="text" name="acc" id="acc" style="width:95%" maxlength="12"></td>
        </tr>
        <tr>
            <td>Stpe２：密碼</td>
            <td><input type="password" name="pw" id="pw" style="width:95%" maxlength="12"></td>
        </tr>
        <tr>
            <td>Stpe３：再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2" style="width:95%" maxlength="12"></td>
        </tr>
        <tr>
            <td>Stpe４：信箱（忘記密碼時使用）</td>
            <td><input type="text" name="email" id="email" style="width:95%"></td>
        </tr>
        <tr>
            <td><button onclick="reg()">註冊</button><button onclick="clean()">重置</button></td>
            <td style="text-align:end"><a href="?do=forget">忘記密碼</a> | <a href="?do=reg">尚未註冊</a></td>
        </tr>
    </table>
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
        alert("不得空白");
    } else {
        $.post('./api/chk_acc.php', {
            acc
        }, (res) => {
            if (res > 0) {
                alert("帳號重覆")
            } else {
                if (pw != pw2) {
                    alert("密碼錯誤");
                } else {
                    $.post('./api/reg.php', {
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