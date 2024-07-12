<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/edit.php" method="post">
        <table class="tab aut">
            <tr>
                <th>帳號</th>
                <th>密碼</th>
                <th>刪除</th>
            </tr>
            <?php
            $rows = $User->all();
            foreach ($rows as $row) {
            ?>
                <tr>
                    <td style="text-align:center"><?= $row['acc'] ?></td>
                    <td style="text-align:center"><?= str_repeat("*", mb_strlen($row['pw'])) ?></td>
                    <td style="text-align:center"><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
                </tr>
                <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
                <input type="hidden" name="table" value="user">
            <?php
            }

            ?>
        </table>
        <div class="ct"><input type="submit" value="確定刪除"><input type="reset" value="清空選取"></div>
    </form>
    <h2>新增會員</h2>
    <span style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</span>
    <table class="tab aut">
        <tr>
            <td style="width:50%">Step1:登入帳號</td>
            <td style="width:50%"><input type="text" name="acc" id="acc" style="width:90%"></td>
        </tr>
        <tr>
            <td style="width:50%">Step2:登入密碼</td>
            <td style="width:50%"><input type="password" name="pw" id="pw" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td style="width:50%">Step3:再次確認密碼</td>
            <td style="width:50%"><input type="password" name="pw2" id="pw2" style="width:90%"></td>
        <tr>
            <td style="width:50%">Step4:信箱(忘記密碼時使用)</td>
            <td style="width:50%"><input type="text" name="pw" id="email" style="width:90%"></td>
        </tr>
        <tr>
            <td colspan="2">
                <button onclick="reg()">註冊</button><button onclick="clean()">清除</button>
            </td>
        </tr>
    </table>
</fieldset>
<script>
    function clean() {
        $('input[type="text"],input[type="password"]').val("")
    }

    function reg() {
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        let pw2 = $('#pw2').val();
        let email = $('#email').val();
        if (acc == "" || pw == "" || pw2 == "" || email == "") {
            alert("不可空白");
        } else {
            if (pw != pw2) {
                alert("密碼錯誤");
            } else {
                $.post('./api/chk_acc.php', {
                    acc
                }, (res) => {
                    if (res == 0) {
                        $.post('./api/reg.php', {
                            acc,
                            pw,
                            email
                        }, () => {
                            location.reload();
                        })
                    } else {
                        alert("帳號重覆");
                    }
                })
            }
        }
    }
</script>