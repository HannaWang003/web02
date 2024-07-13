<?php
$table = $_GET['do'];
$DB = ${ucfirst($table)};
?>
<fieldset class="tab aut">
    <legend>最新文章管理</legend>
    <form action="./api/edit.php" method="post">
        <table class="tab aut">
            <tr>
                <th>編號</th>
                <th style="width:70%">標題</th>
                <th>顯示</th>
                <th>刪除</th>
            </tr>
            <?php
            $total = $DB->count();
            $div = 3;
            $pages = ceil($total / $div);
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;
            $rows = $DB->all("limit $start,$div");
            foreach ($rows as $idx => $row) {
            ?>
                <tr>
                    <td style="text-align:center"><?= $start + $idx + 1 ?>. </td>
                    <td style="text-align:center"><?= $row['title'] ?></td>
                    <td style="text-align:center"><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?= ($row['sh'] == 1) ? "checked" : "" ?>></td>
                    <td style="text-align:center"><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
                </tr>
                <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
            <?php
            }
            ?>
            <input type="hidden" name="table" value="news">
        </table>
        <div class="ct">
            <?php
            if ($now - 1 > 0) {
                $prev = $now - 1;
                echo "<a href='?do=$table&p=$prev'> < </a>";
            }
            for ($i = 1; $i <= $pages; $i++) {
                $style = ($now == $i) ? "style='font-size:20px;color:darkblue'" : "";
                echo "<a href='?do=$table&p=$i' $style>$i</a>";
            }
            if ($now + 1 <= $pages) {
                $next = $now + 1;
                echo "<a href='?do=$table&p=$next'> > </a>";
            }
            ?>
        </div>
        <div class="ct"><button>確定修改</button></div>
    </form>
</fieldset>