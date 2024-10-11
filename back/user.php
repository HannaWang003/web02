<fieldset class="fie aut">
    <legend><b>帳號管理</b></legend>
    <form action="./api/del.php?do=user" method="post">
        <table class="tab aut fie">
            <tr>
                <th class="clo">帳號</th>
                <th class="clo">密碼</th>
                <th class="clo">刪除</th>
            </tr>
            <?php
            $rows = $DB->all("where `acc`!='admin'");
            foreach ($rows as $row) {
            ?>
            <tr>
                <td class="ct"><?= $row['acc'] ?></td>
                <td class="ct"><?= str_repeat("*", mb_strlen($row['pw'])) ?></td>
                <td class="ct"><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
            </tr>
            <?php
            }
            ?>
            <tr>
                <td class="ct" colspan="3"><input type="submit" value="確定刪除"><input type="reset" value="清空選取"></td>
            </tr>
        </table>
    </form>
    <h1>新增會員</h1>

    <table class="tab aut">
        <tr>
            <td colspan="2"><b style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</b></td>
        </tr>
        <tr>
            <td class="clo" width="50%">Step1 : 登入帳號</td>
            <td><input type="text" name="acc" id="acc" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo" width="50%">Step2 : 登入密碼</td>
            <td><input type="password" name="pw" id="pw" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo" width="50%">Step3 : 再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo" width="50%">Step4 : 信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email" style="width:90%"></td>
        </tr>
        <tr>
            <td class="l">
                <input type="button" value="新增" onclick="reg()"><input type="button" value="清除" onclick="clean()">
            <td class="r"></td>
            </td>
        </tr>
    </table>
</fieldset>
<script>
function reg() {
    let acc = $('#acc').val();
    let pw = $('#pw').val();
    let pw2 = $('#pw2').val();
    let email = $('#email').val();
    let values = [acc, pw, pw2, email];
    if (values.some(value => value.trim() == "")) {
        alert("不得空白");
    } else {
        if (pw != pw2) {
            alert("密碼錯誤");
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
                    }, (res) => {
                        console.log(res);
                        location.reload();
                    })
                }
            })
        }
    }
}

function clean() {
    location.reload();
}
</script>