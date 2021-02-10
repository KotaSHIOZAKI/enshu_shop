<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>会員登録画面</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<?php require 'menu.php'; ?>

	<form action="customer_output.php" method="post">
		<table>
			<tr>
				<td>お名前</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>ご住所</td>
				<td><input type="text" name="address"></td>
			</tr>
			<tr>
				<td>ログイン名</td>
				<td><input type="text" name="login"></td>
			</tr>
			<tr>
				<td>パスワード</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td><input type="submit" value="確定"></td>
			</tr>
		</table>
	</form>

</body>

</html>