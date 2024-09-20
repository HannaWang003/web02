<fieldset>
    <legend>
        <h2>目前位置 : 首頁 > 問卷調查</h2>
    </legend>
    <table class="tab aut">
        <tr>
            <th width="5%">編號</th>
            <th style="text-align:start">問卷題目</th>
            <th width="8%">投票總數</th>
            <th width="5%">結果</th>
            <th width="8%">狀態</th>
        </tr>
        <?php
        $rows = $DB->all(['big_id' => 0]);
        foreach ($rows as $idx => $row) {
        ?>
            <tr>
                <td class="ct"><?= $idx + 1 ?>.</td>
                <td><?= $row['text'] ?></td>
                <td class="ct"><?= $row['vote'] ?></td>
                <td class="ct"><a href="?do=result&id=<?= $row['id'] ?>">結果</a></td>
                <td class="ct">
                    <?= (isset($_SESSION['user'])) ? "<a href='?do=vote&id={$row['id']}'>參與投票</a>" : "<a href='?do=login'>請先登入</a>" ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</fieldset>