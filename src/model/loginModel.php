<?php

namespace login;

use PDO;
use PDOException;

require_once __DIR__ . '/../database/connect.php';


class loginModel
{
    private $dsn;

    public function __construct()
    {
        $this->connectDB();
    }

    public function connectDB()
    {
        $this->dsn = new PDO("mysql:host=mysql;dbname=my_database", "my_user", "my_password");
        $this->dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function checkLoginData($email, $userPassword)
    {
        try {
            $getData = "SELECT * FROM User WHERE Email = :email";
            $stmt = $this->dsn->prepare($getData);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($userPassword, $userData["UserPassword"])) {
                $_SESSION['IdUser'] = $userData['IdUser'];
                $_SESSION['FirstName'] = $userData['FirstName'];
                $_SESSION['LastName'] = $userData['LastName'];
                $_SESSION['Email'] = $userData['Email'];
                $_SESSION['UserPassword'] = $userData['UserPassword'];

                header("Location: /");
                exit;
            } else {
                echo "email ou mot de passe incorrect";
            }
        } catch (PDOException $e) {
            $error  = "error: " . $e->getMessage();
            echo $error;
        }
    }
}
