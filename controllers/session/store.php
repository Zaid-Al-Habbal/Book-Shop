<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database']);

$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password,8,255)) {
    $errors['password'] = 'Please provide a valid password.';
}

if (! empty($errors)) {
    return view('session/create.view.php', [
        'errors' => $errors
    ]);
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->fetch();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login($user);

        header('location: /');
        exit();
    }
}

return view('session/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for that email address and password.'
    ]
]);



