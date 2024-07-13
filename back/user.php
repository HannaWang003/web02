<fieldset class="tab aut">
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
                    <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="ct"><input type="submit" value="確定刪除"><input type="reset" value="清空選取"></div>
        <input type="hidden" name="table" value="user">
    </form>

    <h2>新增會員</h2>
    <span style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</span>
    <table style="width:100%">
        <tr>
            <td>Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc" style="width:80%;"></td>
        </tr>
        <tr>
            <td>Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw" style="width:80%;" c></td>
        </tr>
        <tr>
            <td>Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2" style="width:80%;"></td>
        </tr>
        <tr>
            <td>Step1:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email" style="width:80%;"></td>
        </tr>
    </table>
    <div><button onclick="reg()">新增</button><button onclick="clean()">清除</button></div>
</fieldset>
<script>
    function clean() {
        $(`input[type="text"],input[type="password"]`).val("");
    }

    function reg() {
        let pw = $('#pw').val();
        let pw2 = $('#pw2').val();
        let acc = $('#acc').val();
        let email = $('#email').val();
        if (pw == "" || pw2 == "" || acc == "" || email == "") {
            alert("不可空白");
        } else {
            if (pw != pw2) {
                alert("密碼錯誤");
            } else {
                $.post('./api/chk_acc.php', {
                    acc
                }, (res) => {
                    if (res != 0) {
                        alert("帳號重覆");
                    } else {
                        $.post('./api/reg.php', {
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