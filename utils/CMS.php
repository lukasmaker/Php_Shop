<?php
    require_once 'Db.php';
    class CMS{
        static function getContent($id_key) {
            $language = isset($_COOKIE["language"]) ? $_COOKIE["language"] : "en";
            $db = new Db();
            return $db->getContentById($id_key);
            // if ($id == "login") {
            //     if($language == 'pl') {
            //       return "loginPL";
            //     } else if($language == 'en') {
            //     return "loginEN";
            //     } else if($language == 'de') {
            //     return "loginDE";
            //     }
            }
        }
?>