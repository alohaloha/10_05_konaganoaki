<?php
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
session_start();
$errors = array();
if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body= $_POST['body'];
    $name = htmlspecialchars($name,ENT_QUOTES);
    $email = htmlspecialchars($email, ENT_QUOTES);
    $subject = htmlspecialchars($subject, ENT_QUOTES);
    $body = htmlspecialchars($body, ENT_QUOTES);
    
    if($name===""){
        $errors['name'] = "お名前が入力されていません。";
    }
    if($email===""){
        $errors['email'] = "メールアドレスが入力されていません。";
    }
    if($body===""){
        $errors['body'] = "お問い合わせ内容が入力されていません。";
    }

    if(count($errors)===0){
        $_SESSION = array();
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['subject'] = $subject;
        $_SESSION['body'] = $body;

        header('Location:form2.php');

        exit();
    }
}

if(isset($_GET['action']) && $_GET['action']==='edit'){
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $subject = $_SESSION['subject'];
    $body = $_SESSION['body'];
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
    <title>確認画面付きFORM</title>
</head>

<body>
    <?php
    echo"<ul>";
    foreach($errors as $value){
        echo"<li>";
        echo $value;
        echo "</li>";
    }
    echo"</ul>";
    
    
    ?>
    <form action="form1.php" method="post">
        <table>
            <tr>
                <th><label for="name">お名前</label></th>
                <td><input type="text" name="name" id="name" value="<?php if(isset($name)){echo $name;}?>"></td>
            </tr>
            <tr>
                <th><label for="email">メールアドレス</label></th>
                <td><input type="text" name="email" id="email" value="<?php if(isset($email)){echo $email;}?>"></td>
            </tr>
            <tr>
                <th><label for="subject">お問い合わせの種類</label></th>
                <td>
                    <select name="subject" id="subject">
                        <option value="お仕事に関するお問い合わせ" <?php if((isset($subject)) && $subject==="お仕事に関するお問い合わせ"){echo "selected";}?>>お仕事に関するお問い合わせ</option>
                        <option value="その他のお問い合わせ" <?php if((isset($subject)) && $subject==="その他のお問い合わせ"){echo "selected";}?>>その他のお問い合わせ</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="body">お問い合わせ内容</label></th>
                <td><textarea name="body" id="body" cols="40" rows="10"><?php if(isset($body)){echo $body;}?></textarea></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="確認画面へ" name="submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>