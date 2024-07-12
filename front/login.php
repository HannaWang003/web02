<fieldset class="tab aut">
    <legend>會員登入</legend>
    <table class="tab aut">
        <tr>
            <td style="width:50%">帳號</td>
            <td style="width:50%"><input type="text" name="acc" id="acc" style="width:90%"></td>
        </tr>
        <tr>
            <td style="width:50%">密碼</td>
            <td style="width:50%"><input type="password" name="pw" id="pw" style="width:90%"></td>
        </tr>
        <tr>
            <td>
                <button onclick="chk_acc()">登入</button><button onclick="clean()">清除</button>
            </td>
            <td style="text-align:end"><a href="?do=forget">忘記密碼</a> | <a href="?do=reg">尚未註冊</a></td>
        </tr>
    </table>
</fieldset>
<script>
    function clean() {
        $('#acc').val("")
        $('#pw').val("")
    }

    function chk_acc() {
        let acc = $('#acc').val();
        $.post('./api/chk_acc.php', {
            acc
        }, (res) => {
            if (res == 0) {
                alert("查無帳號");
                clean();
            } else {
                let pw = $('#pw').val();
                $.post('./api/chk_pw.php', {
                    acc,
                    pw
                }, (res) => {
                    if (res == 0) {
                        alert("密碼錯誤");
                        clean();
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