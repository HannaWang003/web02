<fieldset>
    <legend>
        <h3>目前位置：首頁 ＞ 問卷調查</h3>
    </legend>
    <table class="aut">
        <tr>
            <th width="5%">編號</th>
            <th width="75%">問卷題目</th>
            <th width="10%">投票總數</th>
            <th width="5%">結果</th>
            <th width="5%">狀態</th>
            <th></th>
        </tr>
        <?php
        $rows = $Que->all(['big_id' => 0]);
        foreach ($rows as $idx => $row) {
            $idx = $idx + 1
        ?>
        <tr>
            <td class="clo" style="padding:10px"><?= $idx ?></td>
            <td class="clo" style="padding:10px"><?= $row['text'] ?></td>
            <td style="padding:10px"><?= $row['vote'] ?></td>
            <td style="padding:10px"><a href="?do=res&id=<?= $row['id'] ?>">結果</a></td>
            <td>
                <?php
                    if (!isset($_SESSION['user'])) {
                    ?>
                <a href="?do=login">請先登入</a>
                <?php
                    } else {
                    ?>
                <a href="?do=vote&id=<?= $row['id'] ?>">參與投票</a>
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