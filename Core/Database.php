<?php

namespace Core;

use PDO;


//connect to our mySQL database 


class Database
{
    public $connection;

    public function __construct($config, $username='root', $password='123456789')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);

        $statement->execute($params);

        return $statement;
    }

    public function fetchOrFail($statement){
        $result = $statement->fetch();

        if(!$result){
            abort(Response::NOT_FOUND);
        }
        return $result;
    }

}