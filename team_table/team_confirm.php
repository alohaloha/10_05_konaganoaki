<?php
session_start();
if(isset($_SESSION['team_name'])){
// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";
$team_name = $_SESSION['team_name'];
$pw = $_SESSION['pw'];
$email = $_SESSION['email'];
$team_category = $_SESSION['team_category'];
$pref = $_SESSION['pref'];
$team_place = $_SESSION['team_place'];
}

//セキュリティ対策で、独自のtokenを発行（ランダムな文字列）
$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(48));
$token = htmlspecialchars($_SESSION['token'],ENT_QUOTES);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>確認画面 - チーム登録</title>
</head>
<body>
    <form action="team_insert.php" method="post">
        <input type="hidden" name="token" value="<?= $token ?>">
        <table>
            <tr>
                <th>チーム名</th>
                <td><?= $team_name ?></td>
            </tr>
            <tr>
                <th>パスワード</th>
                <td><?= $pw ?></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><?= $email ?></td>
            </tr>
            <tr>
                <th>登録カテゴリ</th>
                <td><?= $team_category ?></td>
            </tr>
            <tr>
                <th>所属都道府県</th>
                <td><?= $pref ?></td>
            </tr>
            <tr>
                <th>主な活動場所</th>
                <td><?= nl2br($team_place) ?></td>
                <!-- //n12brは、入力された改行をそのまま引き継ぐ -->
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="送信する">
                </td>
            </tr>
        </table>
    </form>
    <p><a href="team_input.php?action=edit" class="link">入力画面に戻る</a></p>
</body>
</html>