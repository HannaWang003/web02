<fieldset style="width:60%;margin:auto">
    <legend>
        <h3>會員登入</h3>
    </legend>
    <table width="100%">
        <tr>
            <td class="clo">帳號</td>
            <td><input type="text" name="acc" id="acc" style="width:90%"></td>
        </tr>
        <tr>
            <td class="clo">密碼</td>
            <td><input type="password" name="pw" id="pw" style="width:90%"></td>
        </tr>
        <tr>
            <td><input type="button" value="登入"><input type="button" value="清除" onclick="clean()"></td>
            <td style="text-align:end"><a href="?do=forget">忘記密碼</a> | <a href="?do=reg">尚未註冊</a></td>
        </tr>
    </table>
</fieldset>
<script>
$('input[value="登入"]').on('click', () => {
    let acc = $('#acc').val();
    $.post('./api/chk.php?do=user', {
        acc
    }, (res) => {
        if (res == 0) {
            alert("查無帳號");
            clean();
        } else {
            let pw = $('#pw').val();
            $.post('./api/chk.php?do=user', {
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
})

function clean() {
    $('#acc,#pw').val("");
}
</script>