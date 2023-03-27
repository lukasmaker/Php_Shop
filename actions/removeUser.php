<?php
session_start();
if(!isset($_SESSION['logged']) || !$_SESSION['isadmin']){
    header("Location: ../index.php");
}

require_once '../utils/Db.php';
$id=$_GET['id'];
    if(isset($id)){
        Db::removeUser($id);
        header("Location: ../pages/adminPage.php ");
    }
?>