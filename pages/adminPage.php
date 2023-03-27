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
    <link rel="stylesheet" href="../static/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=CMS::getContent("adminPageTitle")?></title>
</head>
<body>
    <?=CMS::getContent("user")?>: <?=$_SESSION['user_name']?> <?=$_SESSION['user_lastname']?>
    <button onclick="location.href='../actions/logout.php'"><?=CMS::getContent("logout")?></button>
    <table>
        <tr>
            <th>Id</th>
            <th><?=CMS::getContent("login")?></th>
            <th><?=CMS::getContent("password")?></th>
            <th><?=CMS::getContent("name")?></th>
            <th><?=CMS::getContent("lname")?></th>
            <th><?=CMS::getContent("role")?></th>
            <th><?=CMS::getContent("age")?></th>
            <th><?=CMS::getContent("isAdmin")?></th>
            <th></th>
            <th></th>
        </tr>
        <?php
            require_once '../utils/Db.php';
            $users = DB::getAllUsers();
            foreach($users as $user) {
                $id = $user['id'];
                $role = $user['role'];
                $login = $user['login'];
                $is_admin_checked = ($user['role'] === "admin") ? "checked" : "";
                echo "<tr>"
                        ."<td>$id</td>"
                        ."<td>{$login}</td>"
                        ."<td>{$user['password']}</td>"
                        ."<td>{$user['name']}</td>"
                        ."<td>{$user['surname']}</td>"
                        ."<td>{$role}</td>"
                        ."<td>{$user['age']}</td>"
                        ."<td>"
                        ."<input type='checkbox' name='isAdmin' onChange='location.href=\"../actions/changeRole.php?id=" . $id . "&role=" . $role . "\"' " . $is_admin_checked . " />"
                        ."</td>"
                        ."<td>"
                        ."<a href='../pages/changeUserInfo.php?login=$login'>"
                                ."<button>".CMS::getContent("edit")."</button>"
                            ."</a>"
                        ."</td>"
                        ."<td>"
                            ."<a href='../actions/removeUser.php?login=$login'>"
                                ."<button>".CMS::getContent("delete")."</button>"
                            ."</a>"
                        ."</td>"
                    ."</tr>";
            }
        ?>
    </table>
</body>
</html>
