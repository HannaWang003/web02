<?php
$div = 3;
$num = $News->count();
$pages = ceil($num / $div);
$now = ($_GET['p']) ?? 1;
$start = ($now - 1) * $div;
$rows = $DB->all("limit $start,$div");
?>
<form action="./api/edit.php?do=news" method="post">
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
            <td class="ct clo" style="padding:10px 20px;"><?= $start + $idx + 1 ?>.</td>
            <td class="ct" style="padding:10px 20px;"><?= $row['title'] ?></td>
            <td class="ct" style="padding:10px 20px;"><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>"
                    <?= ($row['sh'] == 1) ? "checked" : "" ?>>
            </td>
            <td class="ct" style="padding:10px 20px;"><input type="checkbox" name="del[]" value="<?= $row['id'] ?>">
            </td>
            <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
        </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct">
        <?php
        $prev = $now - 1;
        $next = $now + 1;
        echo ($now > 1) ? "<a href='?do=news&p=$prev' style='padding:5px;'> < </a>" : "";
        for ($i = 1; $i <= $pages; $i++) {
            $style = ($now == $i) ? "font-size:20px" : "";
        ?>
        <a href="?do=news&p=<?= $i ?>" style="padding:5px;<?= $style ?>"><?= $i ?></a>
        <?php
        }
        echo ($now < $pages) ? "<a href='?do=news&p=$next' style='padding:5px;'> > </a>" : "";
        ?>
    </div>
    <div class="ct"><input type="submit" value="確定修改"></div>
</form>