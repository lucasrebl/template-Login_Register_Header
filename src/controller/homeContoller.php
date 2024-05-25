<?php

namespace home;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use PDO;

require 'vendor/autoload.php';
require_once __DIR__ . '/../model/homeModel.php';

class homeController
{
    protected $twig;
    private $loader;
    private $homeModel;
    private $dsn;

    public function __construct()
    {
        $this->loader = new FilesystemLoader(__DIR__ . '/../views/templates');
        $this->twig = new Environment($this->loader);
        $this->homeModel = new \home\homeModel();
    }

    public function connectDB()
    {
        $this->dsn = new PDO("mysql:host=mysql;dbname=my_database", "my_user", "my_password");
        $this->dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function home()
    {
        session_start();
        // var_dump($_SESSION);
        $isConnected = false;
        if (isset($_SESSION['IdUser'])) {
            $isConnected = true;
        }
        $this->logOut();
        echo $this->twig->render('home/home.html.twig', ['isConnected' => $isConnected]);
    }

    public function logOut()
    {
        if (isset($_POST['logOut'])) {
            session_unset();
            header("Location: /login");
        }
    }
}
