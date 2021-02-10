<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>購入画面</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php require 'menu.php'; ?>
	<?php if (isset($_SESSION['customer'])){ ?> <!-- 正常処理 -->
		<!-- ログイン後の場合 -->
		<?php if (!empty($_SESSION['product'])){ ?>
			<p>お名前：<?= $_SESSION['customer']['name'] ?></p>
			<p>ご住所：<?= $_SESSION['customer']['address'] ?></p>
			<hr>
			<?php require 'cart.php'; ?>
			<hr>
			<p>内容をご確認いただき、購入を確定してください。</p>
			<a href="purchase_output.php">購入を確定する</a>
		<?php } else {
			print "カートに商品がありません。";
		} ?>
	<?php } else { ?>
		<p>購入手続きを行うにはログインしてください。</p>
	<?php } ?>
</body>

</html>