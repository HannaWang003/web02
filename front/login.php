<style>
a {
    text-decoration: none;
}
</style>
<fieldset class="tab aut">
    <legend>會員登入</legend>
    <table class="tab aut">
        <tr>
            <td>帳號</td>
            <td><input type="text" name="acc" id="acc" style="width:90%;"></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" id="pw" style="width:90%;"></td>
        </tr>
        <tr>
            <td>
                <button onclick="login()">登入</button><button onclick="clean()">清除</button>
            </td>
            <td style="text-align:end">
                <a href="?do=forget">忘記密碼</a> | <a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</fieldset>
<script>
function clean() {
    $(`input[type="text"],input[type="password"]`).val("");
}

function login() {
    let acc = $('#acc').val();
    $.post('./api/chk_acc.php', {
        acc
    }, (res) => {
        if (res == 0) {
            alert("查無帳號");
        } else {
            let pw = $('#pw').val();
            $.post('./api/chk_pw.php', {
                acc,
                pw
            }, (res) => {
                if (res == 0) {
                    alert("密碼錯誤");
                } else {
                    if (acc == "admin") {
                        location.href = "back.php";
                    } else {
                        location.href = "index.php";
                    }
                }
            })
        }
    })
}
</script>