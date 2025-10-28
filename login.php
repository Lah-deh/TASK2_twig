<?php
session_start();
require 'vendor/autoload.php';


$users = json_decode(file_get_contents('db.json'), true);

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$user = null;
foreach ($users as $u) {
    if ($u['email'] === $email && $u['password'] === $password) {
        $user = $u;
        break;
    }
}

if ($user) {
    $_SESSION['user'] = [
        'id' => $user['id'],
        'email' => $user['email'],
        'fullName' => $user['fullName']
    ];
    header('Location: /dashboard');
    exit();
} else {
    $error = 'Invalid credentials';
    require 'templates/login.twig';
}
