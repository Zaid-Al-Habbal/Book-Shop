<?php

use Core\Validator;
use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];

$errors = [];

if(!Validator::email($email)){
    $errors['email'] = "Enter a valid email address, please";
}

if(!Validator::string($password, 8, 255)){
    $errors['password'] = "Password should be at least 8 characters and at most 255";
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}


$user = $db->query("select * from users where email = :email", [
    'email' => $email
])->fetch();

if($user){
    header('location: /');
    exit();
}
$db->query("INSERT INTO users(name, email, password) VALUES (:name, :email, :password)",[
    'password' => password_hash($password, PASSWORD_BCRYPT),
    'email' => $email,
    'name' => $name
]);

$user = $db->query("select * from users where email = :email", [
    'email' => $email
])->fetch();

login($user);


header('location: /');

exit();