<?php

$bookName = $_POST['name'];

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$user_id = $db->query('select * from users where email = :email', [
    'email' => $_SESSION['user']['email']
])->fetch();

$user_id = $user_id['id'];

$db->query('insert into userBooks(name, user_id) values (:name, :user_id)',[
    'name' => $bookName,
    'user_id' => $user_id
]);


require base_path('controllers/books/show.php');