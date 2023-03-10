# mailmvc

mail en PHP 8 mvc procédural avec insertion dans la DB en PDO

## A faire

- Enregistrez sous le fichier `config.php.ini` en `config.php`
- Importez le dernier fichier `mailmvc-2023-...sql` dans MariaDB

## Login

username = "admin"

password = "mdpadmin27"

## Utilisation de Mailer

Vous trouverez toute la documentation à cette adresse :

https://packagist.org/packages/symfony/mailer

et celle-ci :

https://symfony.com/doc/current/mailer.html

Vérifiez que php en version 8 soit bien dans vos variables d'environnement en ouvrant la console :

    php -v

Dans le cas contraire, rajoutez le.

### composer

Lorsque la version de PHP est détectée, installez composer :

https://getcomposer.org/download/

Puis testez-le en tapant dans la console :

    composer self-update

### Installation de Mailer

Ensuite installez à la racine de `mailmvc`

    composer require symfony/mailer

#### Rajoutez de dossier `vendor` dans le .gitignore !
