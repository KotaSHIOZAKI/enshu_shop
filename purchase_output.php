
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>購入画面</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php
	require 'menu.php';
	session_start();

	//MySQLデータベースに接続する
	require 'db_connect.php';

	$purchase_id = 1;
	foreach ($pdo->query('select max(id) from purchase') as $row){
		$purchase_id = $row['max(id)'] + 1;
	}
	//履歴テーブルに追加
	//SQL文を作る（プレースホルダを使った式）
	$sql = "insert into purchase (id, customer_id) values (:id, :customer_id)";
	//プリペアードステートメントを作る
	$stm = $pdo->prepare($sql);
	//プリペアードステートメントに値をバインドする
	$stm->bindValue(':id',$purchase_id,PDO::PARAM_STR);
	$stm->bindValue(':customer_id',$_SESSION['customer']['id'],PDO::PARAM_STR);
	//SQL文を実行する
	// $stm->execute();
	if ($stm->execute()) {
		//SQL成功
		//セッションに入っている商品の数だけpurchase_detailに保存
		foreach ($_SESSION['product'] as $product_id => $product){
			$sql = "insert into purchase_detail (purchase_id, product_id, count) values (:purchase_id, :product_id, :count)";
			//プリペアードステートメントを作る
			$stm = $pdo->prepare($sql);
			//プリペアードステートメントに値をバインドする
			$stm->bindValue(':purchase_id',$purchase_id,PDO::PARAM_STR);
			$stm->bindValue(':product_id',$product_id,PDO::PARAM_STR);
			$stm->bindValue(':count',$product['count'],PDO::PARAM_STR);
			//SQL文を実行する
			$stm->execute();
		}
		//カートのデータをすべて削除する
		unset($_SESSION['product']);
		print "購入手続きが完了しました。ありがとうございます。";
	} else {
		print "購入手続き中にエラーが発生しました。申し訳ございません。";
	}
	?>
</body>

</html>