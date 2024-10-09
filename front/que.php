<fieldset>
    <legend>
        <h3>目前位置 : 首頁 > 問卷調查</h3>
    </legend>
    <table class="aut">
        <tr>
            <th style="padding:5px 10px;" width="2%">編號</th>
            <th style="padding:5px 10px;" class="l">問卷題目</th>
            <th style="padding:5px 10px;" width="8%">投票總數</th>
            <th style="padding:5px 10px;" width="2%">結果</th>
            <th style="padding:5px 10px;" width="8%">狀態</th>
        </tr>
        <?php
$rows=$DB->all(['big_id'=>0]);
foreach($rows as $idx=>$row){
    ?>
        <tr>
            <td style="padding:5px 10px;"><?= $idx + 1 ?></td>
            <td style="padding:5px 10px;"><?= $row['text'] ?></td>
            <td style="padding:5px 10px;"><?= $row['vote'] ?></td>
            <td style="padding:5px 10px;"><a href="?do=result&id=<?= $row['id'] ?>">結果</a></td>
            <td style="padding:5px 10px;">
                <?= (isset($_SESSION['user'])) ? "<a href='?do=vote&id={$row['id']}'>參與投票</a>" : "<a href='?do=user'>請先登入</a>" ?>
            </td>
        </tr>
        <?php
}
        ?>
    </table>
</fieldset>