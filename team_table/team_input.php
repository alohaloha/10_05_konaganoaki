<?php
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
session_start();
$errors = array();
if (isset($_POST['submit'])) {

    $team_name = $_POST['team_name'];
    $pw = $_POST['pw'];
    $email = $_POST['email'];
    $team_category = $_POST['team_category'];
    $pref = $_POST['pref'];
    $team_place = $_POST['team_place'];
    $team_name = htmlspecialchars($team_name, ENT_QUOTES);
    $pw = htmlspecialchars($pw, ENT_QUOTES);
    $email = htmlspecialchars($email, ENT_QUOTES);
    $team_category = htmlspecialchars($team_category, ENT_QUOTES);
    $pref = htmlspecialchars($pref, ENT_QUOTES);
    $team_place = htmlspecialchars($team_place, ENT_QUOTES);

    if ($team_name === "") {
        $errors['team_name'] = "チーム名が入力されていません。";
    }
    if ($pw === "") {
        $errors['pw'] = "パスワードが入力されていません。";
    }
    if ($email === "") {
        $errors['email'] = "メールアドレスが入力されていません。";
    }
    if ($team_category === "--選択してください--") {
        $errors['team_category'] = "登録カテゴリが選択されていません。";
    }
    if ($pref === "") {
        $errors['pref'] = "所属する都道府県が入力されていません。";
    }
    if ($team_place === "") {
        $errors['team_place'] = "主な活動場所が入力されていません。";
    }

    if (count($errors) === 0) {
        $_SESSION = array();
        $_SESSION['team_name'] = $team_name;
        $_SESSION['pw'] = $pw;
        $_SESSION['email'] = $email;
        $_SESSION['team_category'] = $team_category;
        $_SESSION['pref'] = $pref;
        $_SESSION['team_place'] = $team_place;

        header('Location:team_confirm.php');

        exit();
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'edit') {
    $team_name = $_SESSION['team_name'];
    $pw = $_SESSION['pw'];
    $email = $_SESSION['email'];
    $team_category = $_SESSION['team_category'];
    $pref = $_SESSION['pref'];
    $team_place = $_SESSION['team_place'];
}

// echo "<pre>";
// var_dump($errors);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>入力画面 - チーム登録</title>
</head>

<body>
    <?php
    echo "<ul>";
    foreach ($errors as $value) {
        echo "<li>";
        echo $value;
        echo "</li>";
    }
    echo "</ul>";


    ?>
    <form action="team_input.php" method="post">
        <table>
            <tr>
                <th><label for="team_name">チーム名</label></th>
                <td><input type="text" name="team_name" id="team_name" value="<?php if (isset($team_name)) {
                                                                                    echo $team_name;
                                                                                } ?>"></td>
            </tr>
            <tr>
                <th><label for="pw">パスワード</label></th>
                <td><input type="password" name="pw" id="pw" value="<?php if (isset($pw)) {
                                                                        echo $pw;
                                                                    } ?>"></td>
            </tr>
            <tr>
                <th><label for="email">メールアドレス</label></th>
                <td><input type="text" name="email" id="email" value="<?php if (isset($email)) {
                                                                            echo $email;
                                                                        } ?>"></td>
            </tr>
            <tr>
                <th><label for="team_category">登録カテゴリ</label></th>
                <td>
                    <select name="team_category" id="team_category">
                        <option name="team_category" value="--選択してください--">--選択してください--</option>
                        <option name="team_category" value="1" <?php if (isset($team_category) && $team_category === "1") { echo "selected";} ?>>MAX10</option>
                        <option name="team_category" value="2" <?php if (isset($team_category) && $team_category === "2") {echo "selected";} ?>>ENJOY6</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="pref">所属都道府県協会</label></th>
                <td>
                    <input type="text" name="pref" id="pref" value="<?php if (isset($pref)) {echo $pref;} ?>">
                </td>
            </tr>
            <tr>
                <th><label for="team_place">主な活動場所</label></th>
                <td><textarea name="team_place" id="team_place" cols="40" rows="5"><?php if (isset($team_place)) {
                                                                                        echo $team_place;
                                                                                    } ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="確認画面へ" name="submit"></td>
            </tr>
        </table>
    </form>
    <a href="team_read.php" class="link">一覧へ</a>
</body>

</html>