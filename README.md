# Template

Ce projet est un site qui sert de template pour un système de register/login,
avec un header qui change en fonction de si l'utilisateur est connecter ou non.

# Technologie

  - PHP
  - HTML/Twig
  - CSS/JS
  - MySQL
  - Docker

# Prerequisites

  - Avoir docker d'installer
  - Avoir un ide tel que (vs code, PHPStorm...)

# Installation

  - Première étape: clone le repository
    ```bash
    https://github.com/lucasrebl/template-Login_Register_Header.git
    ```

  - Deuxième étape: Cliquer sur le lien suivant pour télécharger les fichier nécessaire au lancement du projet
      les fchiers à télécharger sont :
        - Dockerfile
        - docker-compose.yaml
        - .htaccess
    
      https://github.com/lucasrebl/template-Login_Register_Header/releases

      Attention le fichier .htaccess est nommé 'default.htaccess',
      une fois télécharger renommé le juste '.htaccess' sinon cela ne fonctionnera pas.

  - Troisième étape: Ouvrer le projet dans un ide puis placé les 2 fichiers docker à la raçine du projet

  - Quatrième étape: Lancer docker et éxecuter la commande suivant
    ```bash
    docker compose up -d --build
    ```

    puis cette commande
    ```bash
    sudo chmod -R 777 src
    ```
    cette commande vous demanderz votre mot de passe

  - Cinquième étape: Aller dans le dossier src et éxecuter la commande suivant
    ```bash
    composer require "twig/twig:^3.0"
    ```
   
  - Sixième étape: dans le dossier src placé le fichier .htaccess télécharger précédemment 
    
  - Septième étape: Aller sur ce lien pour voir le site
    ```bash
    http://localhost:8080/
    ```

# Contributor

Lucas Reboulet

# Contact

Si vous avez une question ou un probleme n'hésitez pas à me contacter à l'adresse mail suivant: rebouletlucas@gmail.com
