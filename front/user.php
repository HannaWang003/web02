<fieldset class="tab aut">
    <legend><b>會員登入</b></legend>
    <table class="tab aut">
        <tr>
            <td class="clo" width="50%">帳號</td>
            <td><input type="text" name="acc" id="acc" style="width:90%"></td>
        </tr>
        <tr>
            <td class="clo" width="50%">密碼</td>
            <td><input type="password" name="pw" id="pw" style="width:90%"></td>
        </tr>
        <tr>
            <td class="l">
                <input type="button" value="登入" onclick="login()"><input type="button" value="清除" onclick="clean()">
            <td class="r"><a href="?do=forget">忘記密碼</a> | <a href="?do=reg">尚未註冊</a></td>
            </td>
        </tr>
    </table>
</fieldset>
<script>
function login() {
    let acc = $('#acc').val();
    $.post('./api/chk_acc.php?do=user', {
        acc
    }, (res) => {
        if (res <= 0) {
            alert("查無帳號");
            clean();
        } else {
            let pw = $('#pw').val();
            $.post('./api/chk_acc.php?do=user', {
                acc,
                pw
            }, (res) => {
                if (res <= 0) {
                    alert("密碼錯誤");
                    clean()
                } else {
                    location.href = (acc == "admin") ? "back.php" : "index.php";
                }
            })
        }
    })
}

function clean() {
    location.reload();
}
</script>