<?php
//XSS�б��� echo������ǻ��ѡ�����ʳ���NG ��
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB��³�ؿ���db_conn()
function db_conn(){
    try {
    $db_name = "liveonce_php02";    //�ǡ����١���̾
    $db_id   = "liveonce_php02";      //���������̾=�ǡ����١���̾
    $db_pw   = "";          //�ѥ���ɡ�XAMPP�ϥѥ����̵�� or MAMP�ϥѥ���ɡ�root�ɤ˽������Ƥ���������
    $db_host = "mysql3102.db.sakura.ne.jp"; //DB�ۥ���
    return new PDO('mysql:dbname=liveonce_php02;charset=utf8;host=mysql3102.db.sakura.ne.jp', 'liveonce', '2Mu5sXKtNb5w');//�ؿ�����ˤ��뤿��$pdo=���ȼ¹Ԥ���ʤ����ᳰ�˽Ф�
    } catch (PDOException $e) {
        exit('DB Connection Error:'.$e->getMessage());
    }
}



//SQL���顼�ؿ���sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}


//������쥯�ȴؿ�: redirect($file_name)
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}

