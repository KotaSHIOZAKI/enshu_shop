<?php session_start(); ?>

<?php
	//customerセッション変数を破棄
	unset($_SESSION['customer']);
	//MySQLデータベースに接続する
	require 'db_connect.php';
	//SQL文を作る（プレースホルダを使った式）
	$sql = "insert into customer (id, name, address, login, password) values (null, :name, :address, :login, :password)";
	//プリペアードステートメントを作る
	$stm = $pdo->prepare($sql);
	//プリペアードステートメントに値をバインドする
	$stm->bindValue(':name',$_POST['name'],PDO::PARAM_STR);
	$stm->bindValue(':address',$_POST['address'],PDO::PARAM_STR);
	$stm->bindValue(':login',$_POST['login'],PDO::PARAM_STR);
	$stm->bindValue(':password',$_POST['password'],PDO::PARAM_STR);
	//SQL文を実行する
	$stm->execute();
	//結果の取得（連想配列で受け取る）
	$result = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>会員登録画面</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<?php require 'menu.php'; ?>
	お客様情報を登録しました。
</body>

</html>