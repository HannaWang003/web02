<fieldset class="tab aut">
    <legend>帳號管理</legend>
    <form action="./api/del.php?do=user" method="post">
        <table class="tab aut" style="text-align:center;">
            <tr>
                <th>帳號</th>
                <th>密碼</th>
                <th>刪除</th>
            </tr>
            <?php
            $rows = $DB->all();
            foreach ($rows as $row) {
            ?>
            <tr>
                <td><?= $row['acc'] ?></td>
                <td><?= str_repeat("*", mb_strlen($row['pw'])) ?></td>
                <td><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
            </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan="3"><input type="submit" value="確定刪除"><input type="reset" value="清空選取"></td>
            </tr>
        </table>
    </form>
    <h2>新增會員</h2>
    <span style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</span>
    <table class="tab">
        <tr>
            <td class="clo" width="50%">Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo" width="50%">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo" width="50%">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo" width="50%">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email" style="width:90%"></td>
        </tr>
        <tr>
            <td colspan="2"><button onclick="reg()">新增</button><button onclick="location.reload()">清除</button></td>
        </tr>
    </table>
</fieldset>
<script>
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
            if (res != 0) {
                alert("帳號重覆")
            } else {
                if (pw != pw2) {
                    alert("密碼不一致")
                } else {
                    $.post('./api/reg.php?do=user', {
                        acc,
                        pw,
                        email
                    }, () => {
                        location.reload();
                    })
                }
            }
        })
    }
}
</script>