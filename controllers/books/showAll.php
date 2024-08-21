<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$books = $db->query('select * from books')->fetchAll();

view("books/showAll.view.php", [
    'heading' => 'Browser books',
    'books' => $books
]);
