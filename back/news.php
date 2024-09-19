<?php
$div = 3;
$num = $DB->count();
$now = ($_GET['p']) ?? 1;
$pages = ceil($num / $div);
$start = ($now - 1) * $div;
$rows = $DB->all("limit $start,$div");
?>
<fieldset>
    <legend>最新文章管理</legend>
    <form action="./api/del_news.php?do=news" method="post">
        <table class="tab aut">
            <tr>
                <th>編號</th>
                <th>標題</th>
                <th>顯示</th>
                <th>刪除</th>
            </tr>
            <?php
            foreach ($rows as $idx => $row) {
            ?>
            <tr>
                <td class="ct"><?= $idx + $start + 1 ?>.</td>
                <td class="ct"><?= $row['title'] ?></td>
                <td class="ct"><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>"
                        <?= ($row['sh'] == 1) ? "checked" : "" ?>></td>
                <td class="ct"><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
            </tr>
            <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
            <?php
            }
            ?>
        </table>
        <div class="ct">
            <?php
            $prev = $now - 1;
            $next = $now + 1;
            echo ($now > 1) ? "<a href='?do=news&p=$prev'> < </a>" : "";
            for ($i = 1; $i <= $pages; $i++) {
                $style = ($i == $now) ? "font-size:20px" : "";
                echo "<a href='?do=news&p=$i' style='$style'>$i</a>";
            }
            echo ($now < $pages) ? "<a href='?do=news&p=$next'> > </a>" : "";

            ?>
        </div>
        <div class="ct"><input type="submit" value="確定修改"></div>
    </form>
</fieldset>