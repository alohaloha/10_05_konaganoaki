<?php
session_start();
if(isset($_SESSION['name'])){
// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$subject = $_SESSION['subject'];
$body = $_SESSION['body'];
}

$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(48));
$token = htmlspecialchars($_SESSION['token'],ENT_QUOTES);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>確認画面 - お問合せ</title>
</head>
<body>
    <form action="form3.php" method="post">
        <input type="hidden" name="token" value="<?= $token ?>">
        <table>
            <tr>
                <th>お名前</th>
                <td><?= $name ?></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><?= $email ?></td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td><?= $subject ?></td>
            </tr>
            <tr>
                <th>お問合せ内容</th>
                <td><?= nl2br($body) ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="送信する">
                </td>
            </tr>
        </table>
    </form>
    <p><a href="form1.php?action=edit">入力画面に戻る</a></p>
</body>
</html>