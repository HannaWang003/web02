<fieldset>
    <legend>
        <h3>目前位置 : 首頁 > 問卷調查 </h3>
    </legend>
    <table width="100%">
        <tr>
            <th style="padding:5px 10px;" width="5%">編號</th>
            <td style="padding:5px 10px;"><b>問卷題目</b></td>
            <th style="padding:5px 10px;" width="8%">投票總數</th>
            <th style="padding:5px 10px;" width="5%">結果</th>
            <th style="padding:5px 10px;" width="8%">狀態</th>
        </tr>
        <?php
        $rows = $DB->all(['big_id' => 0]);
        foreach ($rows as $idx => $row) {
        ?>
        <tr>
            <td class="ct" style="padding:5px 10px;"><?= $idx + 1 ?></td>
            <td style="padding:5px 10px;"><?= $row['text'] ?></td>
            <td style="padding:5px 10px;"><?= $row['vote'] ?></td>
            <td class="ct" style="padding:5px 10px;"><a href="?do=result&id=<?= $row['id'] ?>">結果</a></td>
            <td class="ct" style="padding:5px 10px;">
                <?= (isset($_SESSION['user'])) ? "<a href='?do=vote&id={$row['id']}'>參與投票</a>" : "<a href='?do=login'>請先登入</a>" ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</fieldset>