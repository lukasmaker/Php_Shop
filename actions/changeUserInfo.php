<?php


require_once '../utils/Db.php';
$w=0;
if(isset($_POST['login']) && isset($_POST['password']) 
&& isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['age'])){
    $login=$_POST['login'];
    if(iconv_strlen($login)<=50){
        $user=Db::getUserByLogin($login);
        $password=$_POST['password'];
        $name=$_POST['name'];
        $surname=$_POST['surname'];
        $age=$_POST['age'];
        if(iconv_strlen($password)<=20 && iconv_strlen($name)<=20 && iconv_strlen($surname)<=20){
            $w=1;
        }
    }
}
if($w===1){
    Db::changeUser($login, $password, $name, $surname, $age);
    header('Location: ../pages/done2.php');
}
else header("Location: ../pages/changeUserInfo.php?login=$login"); 


?>