<?php require_once '../utils/CMS.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=CMS::getContent("registerTitle")?></title>
    <link rel="stylesheet" href="static/css/style.css">
</head>
<body>
    <h1><?=CMS::getContent("registerMsg")?></h1>
    <form action=../actions/register.php method="POST">
    <p><?=CMS::getContent("login")?> <input type="text" name="login"></p>
    <p><?=CMS::getContent("password")?> <input type="password" name="password"></p>
    <p><?=CMS::getContent("name")?> <input type="text" name="name"></p>
    <p><?=CMS::getContent("lname")?> <input type="text" name="surname"></p>
    <p><?=CMS::getContent("age")?> <input type="number" name="age"></p>
    <input type="submit" value=<?=CMS::getContent("registerMsg")?>>
    </form> 
    <button onclick="location.href='../index.php'"><?=CMS::getContent("exit_index")?></button>
</body>
</html>