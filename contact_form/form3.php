<?php
session_start();

if (isset($_POST['token'], $_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {
    unset($_SESSION['token']);

    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $subject = $_SESSION['subject'];
    $body = $_SESSION['body'];


    $dsn = 'mysql:dbname=contact_form;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';

    $dbh = new PDO($dsn,$user,$password);//PDOクラスはPDOとDBサーバーを接続するクラス
    //new演算子でクラスからインスタンスを作る
    // var_dump($dbh);

    $dbh->query('SET NAMES utf8');//queryメソッド   sql文を発行する準備 文字化け防止のため
    $dbh->setAttribute(pdo::ATTR_EMULATE_PREPARES,false);//セキュリティ対策 静的プレースホルダを指定（説明は割愛）

    $sql = 'INSERT INTO requiriest (id,name,email,subject,body) VALUES(NULL,:name,:email,:subject,:body)';

    $stmt = $dbh->prepare($sql);//prepareメソッド   sql文を準備する 後のexecuteメソッドで実行される
    //正しく準備されるとPDOStatementオブジェクトがメモリに生成され$stmt変数が参照する

    $stmt->bindValue(':name',$name,PDO::PARAM_STR);
    $stmt->bindValue(':email',$email,PDO::PARAM_STR);
    $stmt->bindValue(':subject',$subject,PDO::PARAM_STR);
    $stmt->bindValue(':body',$body,PDO::PARAM_STR);

    $stmt->execute();//準備したsqlが実行される

    $dbh = null;//データベースと切断

    //sessionの破棄とそれに関連するcookieファイルも削除
    $_SESSION = array();
    if(ini_get("session.use_cookies")){
        $params = session_get_cookie_params();
        setcookie(session_name(),'',time()-42000,$params["path"],$params["domain"],$params["secure"],$params["httponly"]);
    }
    session_destroy();

    // echo "きちんとしたアクセスです。";
} else {
    header('Location:form1.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>完了画面 - お問合せ</title>
</head>

<body>
    <div class="thanks">
        <p>お問い合わせありがとうございます。</p>

    </div>
</body>

</html>