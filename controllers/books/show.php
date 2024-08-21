<?php

use Core\Database;


$config = require base_path('config.php');
$db = new Database($config['database']);

$user_id = $db->query('select * from users where email = :email', [
    'email' => $_SESSION['user']['email']
])->fetch();

$user_id = $user_id['id'];

$books = $db->query('select * from userBooks where user_id = :user_id',[
    'user_id' => $user_id
])->fetchAll();


view('books/show.view.php', [
    'heading' => 'Your books',
    'books' => $books
]);