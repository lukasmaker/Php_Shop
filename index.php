<?php
require_once "./utils/CMS.php";
$login = isset($_GET['login']) ? $_GET['login'] : "";
$password = isset($_GET['password']) ? $_GET['password'] : "";
$input_class = ($login || $password) ? "bad_input" : "";
$language = isset($_COOKIE["language"]) ? $_COOKIE["language"] : "en";

if (isset($_POST['selectedLanguage'])) {
    $language = $_POST['selectedLanguage'];
    setcookie("language", $language, strtotime("+30 days"));
    $_COOKIE['language'] = $language;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/style.css">
    <title><?=CMS::getContent("loginTitle")?></title>
</head>
<body>

<form method="POST">
    <select name="selectedLanguage" onchange="this.form.submit()">
        <option value="en" <?= $language == "en" ? "selected" : "" ?>>EN</option>
        <option value="pl" <?= $language == "pl" ? "selected" : "" ?>>PL</option>
        <option value="de" <?= $language == "de" ? "selected" : "" ?>>DE</option>
    </select>
</form>
    <?php
        require_once 'utils/CMS.php';
    ?>
    <form action="./actions/login.php" method="POST">
        <label><?=CMS::getContent("login")?>:</label><br>
        <input class="<?=$input_class?>" type="text" name="login" value="<?=$login?>" required><br/><br/>
        <label><?= CMS::getContent("password")?>:</label><br/>
        <input class="<?=$input_class?>" type="password" name="password" value="<?=$password?>" required><br/><br/>
        <input type="submit" value="<?=CMS::getContent("loginMsg")?>">
    </form>
    <button onclick="location.href='./pages/register.php'"><?=CMS::getContent("registerMsg")?></button>
</body>
</html>