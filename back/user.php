<fieldset>
    <legend>
        <h3>帳號管理</h3>
    </legend>
    <form action="./api/del.php?do=user" method="post">
        <table width="80%" style="margin:auto;">
            <tr>
                <th class="clo">帳號</th>
                <th class="clo">密碼</th>
                <th class="clo">刪除</th>
            </tr>
            <?php
            $rows = $DB->all("where not `acc`='admin'");
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
    <h1>新增會員</h1>
    <table width="80%" style="margin:auto;">
        <tr>
            <td colspan="2">*請設定您要註冊的帳號及密碼(最長12個字元)</td>
        </tr>
        <tr>
            <td class="clo">Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2" style="width:90%" maxlength="12"></td>
        </tr>
        <tr>
            <td class="clo">信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email" style="width:90%"></td>
        </tr>
        <tr>
            <td colspan="2"><button onclick="reg()">新增</button><button onclick="clean(this)">清除</button></td>
        </tr>
    </table>
</fieldset>
<script>
    function clean(dom) {
        $(dom).parents('table').find('input').val("")
    }

    function reg() {
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        let pw2 = $('#pw2').val();
        let email = $('#email').val();
        if (acc == "" || pw == "" || pw2 == "" || email == "") {
            alert("不可空白");
        } else {
            $.post('./api/chk.php?do=user', {
                acc
            }, (res) => {
                if (res != 0) {
                    alert("帳號重覆");
                } else {
                    if (pw != pw2) {
                        alert("密碼錯誤");
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