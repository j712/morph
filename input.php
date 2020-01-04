
<!doctype html>
<html lang="ja">
<head>
	<link href="style.css" rel="stylesheet" type="text/css">
	<meta charset="UTF-8">
	<title></title>
</head>
	<body>
		<form action="controller.php" method="GET">
			<p>, 区切りでモルフを入力するんやで
            <table>
				<tr><td>オス</td><td><input type="text" name="male"></tr>
				<tr><td>メス</td><td><input type="text" name="female"></tr>
			</table>
			<button type="submit" id="insert" value="OK">計算</button>
		</form>
	</body>
</html>
