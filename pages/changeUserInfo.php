<?php
    session_start();
    if (!isset($_SESSION['logged']) || !$_SESSION['is_admin']) {
        header("Location: ../index.php");
    }
    require_once '../utils/CMS.php'; 
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=CMS::getContent("changeUserInfoTitle")?></title>
    <link rel="stylesheet" href="static/css/style.css">
</head>
<body>
    <?php
    require_once '../utils/Db.php';
    $login=$_GET['login'];
    $user=Db::getUserbyLogin($login);  
    ?>

    <h1><?=CMS::getContent("editMsg")?> <?=$user['login']?></h1>
    <form action=../actions/changeUserInfo.php method="POST">
    <input type="hidden" name="login" value="<?=$user['login']?>">
    <p><?=CMS::getContent("password")?> <input type="password" name="password"></p>
    <p><?=CMS::getContent("name")?> <input type="text" name="name"></p>
    <p><?=CMS::getContent("lname")?> <input type="text" name="surname"></p>
    <p><?=CMS::getContent("age")?> <input type="number" name="age"></p>
    <input type="submit" value=<?=CMS::getContent("saveChangeMsg")?>>
    </form> 
    <button onclick="location.href='../pages/adminPage.php'"><?=CMS::getContent("exit_adminPage")?></button>
</body>
</html>