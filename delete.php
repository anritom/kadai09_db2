<?php
//1. POSTデータ取得
$id = $_GET["id"];

//2. DB接続します
include("functions.php");
$pdo = new PDO('mysql:dbname=liveonce_php02;charset=utf8;host=mysql3102.db.sakura.ne.jp', 'liveonce', '2Mu5sXKtNb5w');//local


//３．データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_an_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute([':id'=> $id]); //実行

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("select.php");
}
?>