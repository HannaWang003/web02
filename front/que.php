<style>
fieldset {

    th,
    td {
        padding: 5px 10px;
    }

    td:nth-child(4) {
        background: #eee;

        a {
            color: gray;
        }
    }

    td:nth-child(4):hover {
        background: #000;

        a {
            color: #eee;
            text-decoration: none;

        }
    }
}
</style>
<fieldset class="fie aut">
    <legend><b>目前位置 : 首頁 > 問卷調查</b></legend>
    <table class="aut">
        <tr>
            <th width="2%">編號</th>
            <th class="l">問卷題目</th>
            <th width="8%">投票總數</th>
            <th width="2%">結果</th>
            <th width="8%">狀態</th>
        </tr>
        <?php
        $rows = $DB->all(['big_id' => 0]);
        foreach ($rows as $idx => $row) {
        ?>
        <tr>
            <td><?= $idx + 1 ?>.</td>
            <td><?= $row['text'] ?></td>
            <td><?= $row['vote'] ?></td>
            <td> <a href="?do=result&id=<?= $row['id'] ?>">結果</a></td>
            <td><?= (!isset($_SESSION['user'])) ? "<a href='?do=user'>請先登入</a>" : "<a href='?do=vote&id={$row['id']}'>參與投票</a>" ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</fieldset>