<?php

namespace register;

use PDO;
use PDOException;

require_once __DIR__ . '/../database/connect.php';

class registerModel
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

    public function insertRegisterData($firstName, $lastName, $email, $hased_password)
    {
        try {
            $checkEmail = "SELECT COUNT(*) FROM User WHERE Email = :email";
            $stmt = $this->dsn->prepare($checkEmail);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->fetchColumn() > 0) {
                echo "email déjà existant";
                return;
            } else {
                $insertRegister = "INSERT INTO User (FirstName, LastName, Email, UserPassword) VALUES (:FirstName, :LastName, :Email, :UserPassword)";
                $stmt2 = $this->dsn->prepare($insertRegister);
                $stmt2->bindParam(':FirstName', $firstName);
                $stmt2->bindParam(':LastName', $lastName);
                $stmt2->bindParam(':Email', $email);
                $stmt2->bindParam(':UserPassword', $hased_password);

                if ($stmt2->execute()) {
                    header("Location: /login");
                    exit;
                } else {
                    echo 'erreur dans le register';
                }
            }
        } catch (PDOException $e) {
            $error  = "error: " . $e->getMessage();
            echo $error;
        }
    }
}
