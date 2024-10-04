<fieldset>
    <legend>
        <h3>最新文章管理</h3>
    </legend>
    <form action="./api/news.php?do=news" method="post">
        <table width="90%" style="margin:auto">
            <tr>
                <th>編號</th>
                <th>標題</th>
                <th>顯示</th>
                <th>刪除</th>
            </tr>
            <?php
        $div = 3;
        $total = $DB->count(['sh' => 1]);
        $pages = ceil($total / $div);
        $now = ($_GET['p']) ?? 1;
        $start = ($now - 1) * $div;
        $rows = $DB->all("limit $start,$div");
        foreach ($rows as $idx => $row) {
        ?>
            <tr>
                <td class="clo ct"><?=$start+$idx+1?> . </td>
                <td class="ct"><?=$row['title']?></td>
                <td class="ct"><input type="checkbox" name="sh[]" value="<?=$row['id']?>"
                        <?=($row['sh']==1)?"checked":""?>></td>
                <td class="ct"><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
            </tr>
            <input type="hidden" name="id[]" value="<?=$row['id']?>">
            <?php
        }
        ?>
        </table>
        <div>
            <?php
        $prev = ($now > 1) ? $now - 1 : $now;
        $next = ($now < $pages) ? $now + 1 : $now;
        echo ($now == 1) ? "" : "<a href='?do=news&p=$prev'> < </a>";
        for ($i = 1; $i <= $pages; $i++) {
            $style = ($now == $i) ? "font-size:22px;margin:0 10px" : "";
        ?>
            <a href="?do=news&p=<?= $i ?>" style="<?= $style ?>"><?= $i ?></a>
            <?php
        }
        echo ($now == $pages) ? "" : "<a href='?do=news&p=$next'> > </a>";
        ?>
        </div>
        <div class="ct"><input type="submit" value="確定修改"></div>
    </form>
</fieldset>