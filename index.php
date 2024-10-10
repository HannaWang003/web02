﻿<?php
include_once "./api/db.php";
?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>健康促進網</title>
	<link href="./file/css.css" rel="stylesheet" type="text/css">
	<script src="./file/jquery-1.9.1.min.js"></script>
	<script src="./file/js.js"></script>
</head>

<body>
	<div id="all">
		<div id="title">
			<?= date("Y-m-d l") ?> | 今日瀏覽: <?= $Total->find(['date' => date("Y-m-d")])['total'] ?> | 累積瀏覽:
			<?= $Total->sum('total') ?> <a href="index.php" style="float:right">回首頁</a></div>
		<div id="title2">
			<a href="index.php" title="健康促進網 - 回首頁"><img src="./icon/02B01.jpg" alt=""></a>
		</div>
		<div id="mm">
			<div class="hal" id="lef">
				<a class="blo" href="?do=po">分類網誌</a>
				<a class="blo" href="?do=news">最新文章</a>
				<a class="blo" href="?do=pop">人氣文章</a>
				<a class="blo" href="?do=know">講座訊息</a>
				<a class="blo" href="?do=que">問卷調查</a>
			</div>
			<div class="hal" id="main">
				<div>
					<marquee style="width:80%">請民眾踴躍投稿電子報，讓電子報成為大家相互交流、分享的園地!詳見最新文章</marquee>
					<span style="width:18%; display:inline-block;">
						<?php
						if (isset($_SESSION['user'])) {
							echo "歡迎，" . $_SESSION['user'] . "<br>";
							echo "<button onclick='location.href=`./api/logout.php`'>登出</button>";
							echo ($_SESSION['user'] == "admin") ? "<button onclick='location.href=`back.php`'>管理</button>" : "";
						} else {
						?>
							<a href="?do=user">會員登入</a>
						<?php
						}
						?>
					</span>
					<div class="tab aut">
						<?php
						$do = ($_GET['do']) ?? "type";
						$file = "./front/$do.php";
						if (file_exists($file)) {
							$DB = (${ucfirst($do)}) ?? "";
							include $file;
						} else {
							$DB = ${ucfirst("type")};
							include "./front/type.php";
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<div id="bottom">
			本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2024健康促進網社群平台 All Right Reserved
			<br>
			服務信箱：health@test.labor.gov.tw<img src="./icon/02B02.jpg" width="45">
		</div>
	</div>

</body>

</html>