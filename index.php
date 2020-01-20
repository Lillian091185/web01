<?php include_once "base.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>卓越科技大學校園資訊系統</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>
</head>

<body>
	<div id="cover" style="display:none; ">
		<div id="coverr">
			<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
			<div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
		</div>
	</div>
	<div id="main">
		<?php include "header.php"; ?>
		<div id="ms">
			<div id="lf" style="float:left;">
				<div id="menuput" class="dbor">
					<!--主選單放此-->
					<span class="t botli">主選單區</span>
					<?php
					$main = all("menu", ['parent' => 0, 'sh' => 1]);
					foreach ($main as $m) {
					?>
						<div class="mainmu">
							<a href="<?= $m['href']; ?>" style="color:#000;font-size:13px;text-decoration:none"><?= $m['text']; ?></a>
							<div class="mw">
								<?php
								$chk = nums("menu", ['parent' => $m['id']]);
								if ($chk > 0) {
									$sub = all("menu", ['parent' => $m['id']]);
									foreach ($sub as $s) {
								?>
										<div class="mainmu2">
											<a href="<?= $s['href']; ?>" style="color:#000;font-size:13px;text-decoration:none"><?= $s['text']; ?></a>
										</div>
								<?php
									}
								}
								?>
							</div>
						</div>
					<?php
					}
					?>
				</div>
				<div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
					<span class="t">進站總人數 : <?= $_SESSION['total']; ?></span>
				</div>
			</div>

			<?php

			$do = (!empty($_GET['do'])) ? $_GET['do'] : "home";
			$path = "./front/" . $do . ".php";
			if (file_exists($path)) {
				include $path;
			} else {
				include "./front/home.php";
			}

			?>

			<div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
				<!--右邊-->
				<?php
				if (empty($_SESSION['login'])) {
				?>
					<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo('?do=login')">管理登入</button>
				<?php
				} else {
				?>
					<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo('admin.php')">返回管理</button>
				<?php
				}
				?>
				<div style="width:89%; height:480px;" class="dbor">
					<span class="t botli">校園映象區</span>
					<div class="cent">
						<img src="./icon/up.jpg" onclick="pp(1)">
					</div>
					<?php
						$rows=all("image",['sh'=>1]);
						foreach($rows as $k => $r){
							echo "<div class='im' id='ssaa$k'>";
							echo "<img src='./img/".$r['file']."'>";
							echo "</div>";
						}
					?>
					<div class="cent">
						<img src="./icon/dn.jpg" onclick="pp(2)">
					</div>
					<script>
						var nowpage = 0,
							num = <?=nums("image",['sh'=>1]);?>

						function pp(x) {
							var s, t;
							if (x == 1 && nowpage - 1 >= 0) {
								nowpage--;
							}
							if (x == 2 && (nowpage + 1) * 3 <= num * 1 + 3) {
								nowpage++;
							}
							$(".im").hide()
							for (s = 0; s <= 2; s++) {
								t = s * 1 + nowpage * 1;
								$("#ssaa" + t).show()
							}
						}
						pp(1)
					</script>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<?php include "footer.php"; ?>
	</div>
</body>

</html>