<?php

namespace App\Core;

use App\Core\Database\MigrationRunner;

/**
 * @author  Muhammed Sami
 * @package App\Core
 */
class Database
{
    public \PDO $pdo;

    public function __construct(array $config)
    {
        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations()
    {
        return MigrationRunner::dispatch($this->pdo);
    }
}
