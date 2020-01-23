
<!doctype html>
<html lang="ja">
<head>
	<link href="style.css" rel="stylesheet" type="text/css">
	<meta charset="UTF-8">
	<title></title>
</head>
	<body>
		<form action="controller.php" method="GET">
            <table border="1">
				<tr><th>モルフ名</th><th>確率</th><th>確率</th><th>遺伝子数</th></tr>
        	<?php foreach($morphList as $value){ ?>
					<tr>
						<td><?php echo ($value[0] === "") ? "Normal" : $value[0] ?></td>
						<td><?php echo $value[1]; ?>%</td>
						<td>1/<?php echo 100 / $value[1]; ?></td>
						<td><?php echo (!isset($morphs[1][$value[0]." "])) ? "0" : $morphs[1][$value[0]." "] ?></td>
					</tr>
            <?php } ?>
			</table>
		</form>
	</body>
</html>
