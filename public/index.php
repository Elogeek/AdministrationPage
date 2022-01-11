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
