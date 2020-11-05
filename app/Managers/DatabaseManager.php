<?php

declare(strict_types=1);

namespace App\Managers;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;

class DatabaseManager
{
    public static function database(): Connection
    {
        $connectionParams = [
            'dbname' => $_ENV['DB_DATABASE'],
            'user' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD'],
            'host' => $_ENV['DB_HOST'],
            'driver' => 'pdo_mysql',
        ];
    
        $connection = DriverManager::getConnection($connectionParams);
        $connection->connect();
    
        return $connection;
    }
    
    public static function query(): QueryBuilder
    {
        return self::database()->createQueryBuilder();
    }
}