<?php
    
    class Db {
        static function sayHello() {
            echo "Hello. I am db function!!!!!!";
        }

        static function sayHello2() {
            echo "Hello. I am db function122222222222!!!!!!";
        }

        static function getUserByLogin($login) {
            require_once 'dbConfig.php';
            $conn = new mysqli($host, $db_user, $db_password, $db_name);
            
            if ($conn->connect_errno  == 0) {
                $query = "SELECT * FROM users WHERE login = '$login'";
                $result = $conn->query($query);
                if ($result->num_rows == 1) {
                    $user = $result->fetch_assoc();
                    return $user;
                }
            } else {
                //echo "Nie udalo sie polaczyc z baza";
            }
            return [];
        }

        static function getUserByLoginAndPassword($login, $password) {
            require_once 'dbConfig.php';
            $conn = new mysqli($host, $db_user, $db_password, $db_name);

            $login = mysqli_real_escape_string($conn, $login);
            $password = mysqli_real_escape_string($conn, $password);
            
            if ($conn->connect_errno  == 0) {
                $query = "SELECT * FROM users WHERE login = '$login' AND password='$password'";
                $result = $conn->query($query);
                if ($result->num_rows == 1) {
                    $user = $result->fetch_assoc();
                    return $user;
                }
            } else {
                //echo "Nie udalo sie polaczyc z baza";
            }
            return [];
        }

        static function getAllUsers() {
            require_once 'dbConfig.php';
            $conn = new mysqli($host, $db_user, $db_password, $db_name);
            
            if ($conn->connect_errno  == 0) {
                $query = "SELECT * FROM users";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    $users = [];
                    for($i = 0; $i<$result->num_rows; $i++) {
                        $users[] = $result->fetch_assoc();
                    }
                    return $users;
                }
            } else {
                //echo "Nie udalo sie polaczyc z baza";
            }
            return [];
        }

        static function removeUser($id) {
            require_once 'dbConfig.php';
            $conn = new mysqli($host, $db_user, $db_password, $db_name);
            $query = "DELETE FROM users WHERE id = '$id'";
            $result = $conn->query($query);  
        }

        function getContentById($id_key) {
            $language = isset($_COOKIE["language"]) ? $_COOKIE["language"] : "en";
            $conn = new mysqli('localhost', 'root', '', 'sklep');
            $query = "SELECT $language FROM languages WHERE key_id = '$id_key'";
            $result = $conn->query($query);
            if ($result->num_rows == 1) {
                return $result->fetch_assoc()[$language];
            } else {
                return Db::getContentById("notFoundMsg");
            }
        }
		
        static function addUser($login, $password, $name, $surname, $age){
			require_once 'dbConfig.php';
			//$conn = new mysqli($host, $db_user, $db_password, $db_name);
			$conn = new mysqli('localhost', 'root', '', 'sklep');

			if ($conn->connect_errno ==0){
				$query = "INSERT INTO users(`login`, `password`, `name`, `surname`, `role`, `age`) VALUES ('$login', 
				'$password', '$name', '$surname', 'user', '$age')";
				$resut = $conn->query($query);
			}
			else{
				echo 'Nie udało się polaczyc z baza';
				die;
			}
		}
        
        static function changeUser($login, $password, $name, $surname, $age){
			require_once 'dbConfig.php';
			//$conn = new mysqli($host, $db_user, $db_password, $db_name);
			$conn = new mysqli('localhost', 'root', '', 'sklep');

			if ($conn->connect_errno ==0){
				$query = "UPDATE `users` SET `password`='$password', `name`='$name', `surname`='$surname', `age`='$age' WHERE `login`='$login'";
				// $query = "INSERT INTO users(`login`, `password`, `name`, `surname`, `role`, `age`) VALUES ('$login', 
				// '$password', '$name', '$surname', 'user', '$age')";
				$resut = $conn->query($query);
			}
			else{
				echo 'Nie udało się polaczyc z baza';
				die;
			}
		}

        static function changeUserRole($role, $id){
			require_once 'dbConfig.php';
			$conn = new mysqli($host, $db_user, $db_password, $db_name);
			//$conn = new mysqli('localhost', 'root', '', 'sklep');
			if ($conn->connect_errno ==0){
				if ($role==="admin"){
                    $query = "UPDATE `users` SET `role`='user' WHERE id=$id";
                }else {
                    $query = "UPDATE `users` SET `role`='admin' WHERE id=$id";
                }
				$resut = $conn->query($query);
			}
			else{
				echo 'Nie udało się polaczyc z baza';
				die;
			}
		}
        
	}
?>