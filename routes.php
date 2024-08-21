<?php

    $router->get('/', '/controllers/index.php');
    $router->get('/register', '/controllers/registration/create.php');
    $router->get('/login', '/controllers/session/create.php');
    $router->get('/books', '/controllers/books/showAll.php');
    $router->get('/yourBooks', '/controllers/books/show.php');

    $router->post('/register', '/controllers/registration/store.php');
    $router->post('/session', '/controllers/session/store.php');
    $router->post('/buy', '/controllers/books/store.php');


    $router->delete('/session', 'controllers/session/destroy.php');