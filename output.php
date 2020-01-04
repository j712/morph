
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
        	<?php foreach($morphList as $value){ ?>
					<tr>
						<td><?php echo ($value[0] === "") ? "Normal" : $value[0] ?></td><td><?php echo $value[1]; ?>%</td><td>1/<?php echo 100 / $value[1]; ?></td>
					</tr>
            <?php } ?>
			</table>
		</form>
	</body>
</html>
