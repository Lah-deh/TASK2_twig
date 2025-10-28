<?php
require 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

$page = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($page) {
    case '/':
    case '/home':
        echo $twig->render('home.twig');
        break;

    case '/register':
        echo $twig->render('register.twig');
        break;

    case '/login':
        echo $twig->render('login.twig');
        break;

    case '/dashboard':
        echo $twig->render('dashboard.twig');
        break;
    case '/tickets':
        echo $twig->render('tickets.twig');
        break;
    case '/mine':
        echo $twig->render('mine.twig');
        break;

    default:
        echo $twig->render('404.twig');
        break;
}
