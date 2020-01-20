<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<?php include "marquee.php"; ?>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<h3>更多最新消息顯示區</h3>
	<hr>
	<?php

	$useTable = "news";
	$sum = nums($useTable);
	$div = 5;
	$pages = ceil($sum / $div);
	$p = (!empty($_GET['p'])) ? $_GET['p'] : 1;
	$start = ($p - 1) * $div;
	?>
	
	<ol class="ssaa" style="list-style-type:decimal;" start="<?=($start+1);?>">
		<?php
		$rows=all("news",["sh"=>1]," limit $start,$div");
		foreach($rows as $r){
			echo "<li class='sswww'>";
			echo mb_substr($r['text'],0,25,"utf8");
			echo "<div class='all' style='display:none'>".$r['text']."</div>";
			echo "</li>";
		}
		?>
	</ol>

	<div style="text-align:center">
		<?php

		if (($p - 1) > 0) {
			echo "<a href='index.php?do=$useTable&p=" . ($p - 1) . "' style='text-decoration:none'> < </a>";
		}

		for ($i = 1; $i <= $pages; $i++) {
			$fontSize = ($i == $p) ? "24px" : "16px";
			echo "<a href='index.php?do=$useTable&p=$i' style='font-size:$fontSize;text-decoration:none'> " . $i . " </a>";
		}

		if (($p + 1) <= $pages) {
			echo "<a href='index.php?do=$useTable&p=" . ($p + 1) . "' style='text-decoration:none'> > </a>";
		}
		?>
	</div>
</div>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
	$(".sswww").hover(
		function() {
			$("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
				"top": $(this).offset().top - 50
			})
			$("#alt").show()
		}
	)
	$(".sswww").mouseout(
		function() {
			$("#alt").hide()
		}
	)
</script>