<fieldset class="tab aut">
    <legend>目前位置: 首頁 > 問卷調查</legend>
    <table class="tab aut">
        <tr>
            <th>編號</th>
            <th>問卷題目</th>
            <th>投票總數</th>
            <th>結果</th>
            <th>狀態</th>
        </tr>
        <?php
        $rows = $Que->all(['big_id' => 0]);
        foreach ($rows as $idx => $row) {
        ?>
            <tr>
                <td style="text-align:center"><?= $idx + 1 ?></td>
                <td><?= $row['text'] ?></td>
                <td style="text-align:center"><?= $row['vote'] ?></td>
                <td style="text-align:center"><a href="?do=res&id=<?= $row['id'] ?>">結果</a></td>
                <td style="text-align:center">
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