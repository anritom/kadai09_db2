<?php
$id = $_GET["id"];
//１．PHP
//select.phpコードコピー
//※SQLとデータ取得箇所を修正
//insert.phpを修正（関数化）してからselect.phpを開く
include("functions.php");
$pdo = new PDO('mysql:dbname=liveonce_php02;charset=utf8;host=mysql3102.db.sakura.ne.jp', 'liveonce', '2Mu5sXKtNb5w');//local


//２．データ登録SQL作成
$sql = "SELECT * FROM gs_an_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute([':id' => $id]);

//３．データ表示
$v = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$v =  $stmt->fetch(); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
?>

<!--
２．HTML
index.phpのHTMLを貼付　入力項目は「登録/更新」はほぼ同じ
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>


<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>更新</legend>
     <label>名前：<input type="text" name="name" value="<?=$v["name"]?>"></label><br>
     <label>Email：<input type="text" name="email" value="<?=$v["email"]?>"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"><?=$v["naiyou"]?><?=$v["id"]?></textArea></label><br>
     <input type="hidden" name="id" value="<?=$v["id"]?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>