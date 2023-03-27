<?php
    session_start();
    if(!isset($_SESSION['logged'])){
        header("Location: ../index.php");
    }
    require_once '../utils/Db.php';
        $id=$_GET['id'];
        $role=$_GET['role'];
        if (isset($id) && isset($role)){
            Db::changeUserRole($role, $id);
            header("Location: ../pages/adminPage.php ");
        }
?>