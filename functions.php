<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn()
function db_conn(){
    try {
    $db_name = "liveonce_php02";    //データベース名
    $db_id   = "liveonce_php02";      //アカウント名=データベース名
    $db_pw   = "";          //パスワード：XAMPPはパスワード無し or MAMPはパスワード”root”に修正してください。
    $db_host = "mysql3102.db.sakura.ne.jp"; //DBホスト
    return new PDO('mysql:dbname=liveonce_php02;charset=utf8;host=mysql3102.db.sakura.ne.jp', 'liveonce', '2Mu5sXKtNb5w');//関数の中にあるため$pdo=だと実行されないため外に出す
    } catch (PDOException $e) {
        exit('DB Connection Error:'.$e->getMessage());
    }
}



//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}


//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}

