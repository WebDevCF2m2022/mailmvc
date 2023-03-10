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

ou si vous avez chargé ce répertoire (vous avez un fichier `composer.json` à la racine du projet)

    composer install

#### Rajoutez de dossier `vendor` dans le .gitignore !

Ensuite chargez l'autoloader de composer dans votre contrôleur frontal, après le fichier `config.php` !

Notez que `../model/MailModel.php` n'est plus nécessaire

```php
<?php
# mailmvc\public\index.php

# PHP SESSION CONNECT
session_start();


# Dependencies
require_once "../config.php"; # DB
require_once "../model/UsersModel.php"; # table users
require_once "../model/MessagesModel.php"; # table messages

# Autoload external Librairies (Mailer)
require_once "../vendor/autoload.php";

```

Ouvrez ensuite `mailmvc\controller\publicController.php` et commentez les lignes d'envoi de mail

```php
<?php
# mailmvc\controller\publicController.php

# ...

if ($mail == false || empty($messageDB)) {
        $message = "Mail et/ou message non valides, veuillez recommencer !";
    } else {
        $insert = insertMessages($PDOConnect, $mail, $messageDB);
        if (is_string($insert)) {
            $message = $insert;
        } else {
            /*
            $message = "Votre message à bien été envoyé!";
            // pour l'admin du site
            $mailMessage = "Mail envoyé par $mail \r\n \r\n " . $messageMail;
            $envoi = sendMail(MAIL_FROM, MAIL_ADMIN, "Message sur votre site", $mailMessage);
            // pour l'utilisateur du site
            $mailMessage = "Votre message a bien été envoyé sur le site http://mailmvc.webdev-cf2m.be/";
            $envoi2 = sendMail(MAIL_FROM, $mail, "Message du site mailmvc.webdev-cf2m.be", $mailMessage);
            if ($envoi === true && $envoi2 == true) {
                $message .= "<br>Félicitation";
            }
            */
        }
    }
# ...
```

Ensuite utilisez Mailer pour l'envoi des mails :

```php
<?php
# mailmvc\controller\publicController.php

# ...
} else {

            // Pour l'admin
            $email = (new Email())
                ->from(MAIL_FROM)
                ->to(MAIL_ADMIN)
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject('Un nouveau message est arrivé sur votre site !')
                ->text('Un nouveau message est arrivé sur votre site !\r\n \r\n Posté par ' . $mail)
                ->html('<p>Un nouveau message est arrivé sur votre site !<br><br>Posté par ' . $mail . '</p>');

            $mailer->send($email);

            // Pour l'utilisateur
            $email = (new Email())
                ->from(MAIL_FROM)
                ->to($mail)
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject('Votre message a bien été posté !')
                ->text('Votre message a bien été posté !\r\n \r\n sur le site https://mailmvc.webdev-cf2m.be/')
                ->html('<p>Votre message a bien été posté !<br><br>sur le site  https://mailmvc.webdev-cf2m.be/</p>');

            $mailer->send($email);


            $message = "Votre message à bien été envoyé!";


        }
# ...
```
