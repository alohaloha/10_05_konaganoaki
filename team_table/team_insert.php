<?php
session_start();

if (isset($_POST['token'], $_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {
    unset($_SESSION['token']);

    $team_name = $_SESSION['team_name'];
    $pw = $_SESSION['pw'];
    $email = $_SESSION['email'];
    $team_category = $_SESSION['team_category'];
    $pref = $_SESSION['pref'];
    $team_place = $_SESSION['team_place'];


    $dsn = 'mysql:dbname=contact_form;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';

    $dbh = new PDO($dsn,$user,$password);//PDOクラスはPDOとDBサーバーを接続するクラス
    //new演算子でクラスからインスタンスを作る
    // var_dump($dbh);

    $dbh->query('SET NAMES utf8');//queryメソッド   sql文を発行する準備 文字化け防止のため
    $dbh->setAttribute(pdo::ATTR_EMULATE_PREPARES,false);//セキュリティ対策 静的プレースホルダを指定（説明は割愛）

    $sql = 'INSERT INTO team (id,team_name,pw,email,team_category,pref,team_place,created_at,updated_at) VALUES(NULL,:team_name,:pw,:email,:team_category,:pref,:team_place,sysdate(),sysdate())';

    $stmt = $dbh->prepare($sql);//prepareメソッド   sql文を準備する 後のexecuteメソッドで実行される
    //正しく準備されるとPDOStatementオブジェクトがメモリに生成され$stmt変数が参照する

    $stmt->bindValue(':team_name',$team_name,PDO::PARAM_STR);
    $stmt->bindValue(':pw',$pw,PDO::PARAM_STR);
    $stmt->bindValue(':email',$email,PDO::PARAM_STR);
    $stmt->bindValue(':team_category',$team_category,PDO::PARAM_STR);
    $stmt->bindValue(':pref',$pref,PDO::PARAM_STR);
    $stmt->bindValue(':team_place',$team_place,PDO::PARAM_STR);

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
    header('Location:team_input.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>完了画面 - チーム登録</title>
</head>

<body>
    <div class="thanks">
        <p>登録ありがとうございます。</p>
        <!-- <a href="team_input.php">続けて入力</a> -->

    </div>
</body>

</html>