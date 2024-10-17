<style>
    th,
    td {
        padding: 10px;
    }
</style>
<fieldset>
    <legend>
        目前位置 : 首頁 > 問卷調查
    </legend>
    <table>
        <tr>
            <th width="5%">編號</th>
            <th class="l">問卷題目</th>
            <th width="8%">投票總數</th>
            <th width="5%">結果</th>
            <th width="8%">狀態</th>
        </tr>
        <?php
        $rows = $DB->all(['big_id' => 0]);
        foreach ($rows as $idx => $row) {
        ?>
            <tr>
                <td><?= $idx + 1 ?> . </td>
                <td><?= $row['text'] ?></td>
                <td><?= $row['vote'] ?></td>
                <td><a href="?do=result&id=<?= $row['id'] ?>">結果</a></td>
                <td>
                    <?= (isset($_SESSION['user'])) ? "<a href='?do=vote&id={$row['id']}'>參與投票</a>" : "<a href='?do=user'>請先登入</a>" ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</fieldset>