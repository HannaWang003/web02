<?php
if (isset($_SESSION['user'])) {
    to("index.php");
}
?>
<fieldset>
    <legend>
        <h3>會員登入</h3>
    </legend>
    <table class="aut" width="80%">
        <tr>
            <td class="clo" width="40%">帳號</td>
            <td width="60%"><input type="text" name="acc" id="acc" style="width:80%"></td>
        </tr>
        <tr>
            <td class="clo">密碼</td>
            <td><input type="password" name="pw" id="pw" style="width:80%"></td>
        </tr>
        <tr>
            <td>
                <input type="button" value="登入" onclick="login()"><input type="button" value="清除" onclick="clean()">
            </td>
            <td style="text-align:end"><a href="?do=forget">忘記密碼</a> | <a href="?do=reg">尚未註冊</a></td>
        </tr>
    </table>
</fieldset>
<script>
    function clean() {
        $('input[name="pw"]').val("");
        $('input[name="acc"]').val("");
    }

    function login() {
        let acc = $('#acc').val();
        $.post('./api/chk_user.php?do=user', {
            acc
        }, (res) => {
            if (res == 0) {
                alert("查無帳號");
                clean()
            } else {
                let pw = $('#pw').val();
                $.post('./api/chk_user.php?do=user', {
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
                            location.href = "index.php";
                        }
                    }
                })
            }
        })
    }
</script>