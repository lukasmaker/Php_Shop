<?php require_once '../utils/CMS.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=CMS::getContent("done")?></title>
</head>
<body>
    <h1><?=CMS::getContent("done")?></h1><br>
    <button onclick="location.href='../index.php'"><?=CMS::getContent("exit_index")?></button>
</body>
</html>