<fieldset class="tab aut">
    <legend>目前位置：首頁 > 問卷調查 <span id="nav"></span></legend>
    <table class="aut">
        <tr>
            <th>編號</th>
            <td width="80%"><b>問卷題目</b></td>
            <th width="6%">投票總數</th>
            <th>結果</th>
            <th width="6%">狀態</th>
        </tr>
        <?php
        $rows = $DB->all(['big_id' => 0]);
        foreach ($rows as $key => $row) {
        ?>
            <tr>
                <td><?= $key + 1 ?>.</td>
                <td><?= $row['text'] ?></td>
                <td><?= $row['vote'] ?></td>
                <td><a href="?do=result&id=<?= $row['id'] ?>">結果</a></td>
                <td>
                    <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                        <a href="?do=vote&id=<?= $row['id'] ?>">參與投票</a>
                    <?php
                    } else {
                    ?>
                        <a href="?do=login">請先登入</a>
                    <?php
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</fieldset>