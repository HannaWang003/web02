<fieldset class="tab aut">
    <legend>
        <h2 class="ct">帳號管理</h2>
    </legend>
    <form action="./api/del.php" method="post">
        <table style="width:90%" class="aut">
            <tr>
                <th class="clo">帳號</th>
                <th class="clo">密碼</th>
                <th class="clo">刪除</th>
            </tr>
            <?php
            $rows = $User->all();
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
                <td colspan="3" style="text-align:center"><input type="submit" value="確定刪除"><input type="reset"
                        value="清空選取"></td>
            </tr>
            <input type="hidden" name="table" value="user">
        </table>
    </form>
    <h2>新增會員</h2>
    <table>
        <tr>
            <td colspan="2" style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</td>
        </tr>
        <tr>
            <td class="clo">Stpe１：登入帳號</td>
            <td><input type="text" name="acc" id="acc" style="width:95%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo">Stpe２：登入密碼</td>
            <td><input type="password" name="pw" id="pw" style="width:95%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo">Stpe３：再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2" style="width:95%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo">Stpe４：信箱（忘記密碼時使用）</td>
            <td><input type="text" name="email" id="email" style="width:95%"></td>
        </tr>
        <tr>
            <td colspan="2"><button onclick="reg()">新增</button><button onclick="clean()">重置</button></td>
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
                        location.href = "?do=user";
                    })
                }
            }
        })
    }
}
</script>