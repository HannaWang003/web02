<fieldset>
    <legend><b>帳號管理</b></legend>
    <form action="./api/del.php?do=<?= $do ?>" method="post">
        <table class="tab aut">
            <tr class="clo">
                <th>帳號</th>
                <th>密碼</th>
                <th>刪除</th>
            </tr>
            <?php
            $rows = $DB->all("where `acc` != 'admin'");
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
        </table>
        <div class="ct"><input type="submit" value="確定刪除"><input type="reset" value="清空選取"></div>
    </form>
    <h2>新增會員</h2>
    <h4 style="color:red;width:60%;">*請設定您要註冊的帳號及密碼 ( 最長12個字元 ) </h4>
    <table width="60%">
        <tr>
            <td class="clo" width="50%">Step1 : 登入帳號</td>
            <td><input type="text" name="acc" id="acc" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo">Step2 : 登入密碼</td>
            <td><input type="password" name="pw" id="pw" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo">Step3 : 再次輸入密碼</td>
            <td><input type="password" name="pw2" id="pw2" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo">Step4 : 信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email" style="width:90%"></td>
        </tr>
        <tr>
            <td class="l"><button onclick="reg()">新增</button><button onclick="clean()">清除</button></td>
            <td class="r"></td>
        </tr>
    </table>
</fieldset>
<script>
function clean() {
    location.reload();
}

function reg() {
    let acc = $('#acc').val();
    let pw = $('#pw').val();
    let pw2 = $('#pw2').val();
    let email = $('#email').val();
    if (acc == "" || pw == "" || pw2 == "" || email == "") {
        alert("不得空白");
    } else {
        if (pw != pw2) {
            alert("密碼錯誤")
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
                    }, () => {
                        location.reload();
                    })
                }
            })
        }
    }
}
</script>