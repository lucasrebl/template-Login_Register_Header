<?php

namespace login;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use PDO;

require 'vendor/autoload.php';
require_once __DIR__ . '/../model/loginModel.php';

class loginController
{
    protected $twig;
    private $loader;
    private $loginModel;
    private $dsn;

    public function __construct()
    {
        $this->loader = new FilesystemLoader(__DIR__ . '/../views/templates');
        $this->twig = new Environment($this->loader);
        $this->loginModel = new \login\loginModel();
    }

    public function connectDB()
    {
        $this->dsn = new PDO("mysql:host=mysql;dbname=my_database", "my_user", "my_password");
        $this->dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function login()
    {
        session_start();
        $isConnected = false;
        if (isset($_SESSION['IdUser'])) {
            $isConnected = true;
        }
        $this->getLoginData();
        echo $this->twig->render('login/login.html.twig', ['isConnected' => $isConnected]);
    }

    public function getLoginData()
    {
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $userPassword = $_POST['userPassword'];
            if (empty($email) || empty($userPassword)) {
                echo "veuillez remplir tous les champs";
            } else {
                $this->loginModel->checkLoginData($email, $userPassword);
            }
        }
    }
}
