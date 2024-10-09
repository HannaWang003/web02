<fieldset class="tab aut">
    <legend>
        <h2>會員登入</h2>
    </legend>
    <table class="aut" width="80%">
        <tr>
            <td class="clo" width="40%">帳號</td>
            <td><input type="text" name="acc" id="acc" style="width:90%"></td>
        </tr>
        <tr>
            <td class="clo">密碼</td>
            <td><input type="password" name="pw" id="pw" style="width:90%"></td>
        </tr>
        <tr>
            <td class="l"><button onclick="login()">登入</button><button onclick="clean()">清除</button></td>
            <td class="r"><a href="?do=forget">忘記密碼</a> | <a href="?do=reg">尚未註冊</a></td>
        </tr>
    </table>
</fieldset>
<script>
function clean() {
    location.reload();
}

function login() {
    let acc = $('#acc').val()
    $.post('./api/chk_acc.php?do=user', {
        acc
    }, (res) => {
        if (res == 0) {
            alert("查無帳號");
            clean();
        } else {
            let pw = $('#pw').val();
            $.post('./api/chk_acc.php?do=user', {
                acc,
                pw
            }, (res) => {
                if (res == 0) {
                    alert("密碼錯誤");
                    clean()
                } else {
                    if (acc == "admin") {
                        location.href = "back.php";
                    } else {
                        location.href = "index.php"
                    }
                }
            })
        }
    })
}
</script>