<?php

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

require_once "../vendor/autoload.php";


$loader = new FilesystemLoader("../templates");
$twig = new Environment($loader, [
   // 'debug' => true,
    //'strict_variables' => true,
    'cache' => '../var/cache'
]);

$twig->addExtension(new DebugExtension());

$title = "Administration Page!";

// Affichage du rendu d'un template
echo $twig->render("base.html.twig", ["title" => $title]);

{# Class user #}
    class User
    {
        public string $name;
        public string $lastName;
        public string $mail;

        public function __construct(string $name, string $lastN, string $mail)
        {
            $this->name = $name;
            $this->lastName = $lastN;
            $this->mail = $mail;
        }
    }

    $doe = new User("jhon", "Doe", "doedoe@gmail.com");
    echo $twig->render("users.html.twig", [
        'user' => $doe,
        'item' => ['hello', 'jhon', 'doe']
    ]);
}