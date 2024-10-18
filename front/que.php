<style>
    table {
        width: 100%;

        th,
        td {
            padding: 10px;
        }
    }
</style>
<fieldset style="width:95%;">
    <legend>目前位置 : 首頁 > 問卷調查</legend>
    <table class="aut" width="100%">
        <tr>
            <th width="5%">編號</th>
            <th width="">問卷調查</th>
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
                <td class="clo"><?= $row['text'] ?></td>
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