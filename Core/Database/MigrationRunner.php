<?php

namespace App\Core\Database;

use App\Core\Application;
use App\Core\Output;
use App\Core\Traits\Dispatchable;

/**
 * @author  Muhammed Sami
 * @package App\Core\Database
 */
class MigrationRunner
{
    use Dispatchable;

    protected \PDO $pdo;

    /**
     * MigrationRunner constructor.
     *
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo) { $this->pdo = $pdo; }

    public function handle()
    {
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $files = scandir(Application::$ROOT_DIR.'/migrations');
        $toApplyMigrations = array_diff($files, $appliedMigrations);

        $newMigrations = [];
        foreach ($toApplyMigrations as $migration) {
            if (in_array($migration, ['.', '..'])) {
                continue;
            }

            require_once Application::$ROOT_DIR.'/migrations/'.$migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);
            echo Output::colorize(Output::WARNING, 'Appliying migration :'.$className.PHP_EOL);

            $classInstance = new $className();
            $classInstance->up();
            echo Output::colorize(Output::WARNING, 'Applied migration :'.$className);
            $newMigrations[] = $className;
        }

        if ($newMigrations) {
            $this->saveMigrations($newMigrations);
        }
    }

    public function saveMigrations(array $migrations)
    {
        $formattedMigrations = implode(",", array_map(fn($m) => "('$m')", $migrations));
        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) values $formattedMigrations");
        $statement->execute();
    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations(
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        ) ENGINE=INNODB;");
    }

    public function getAppliedMigrations()
    {
        $statement = $this->pdo->prepare('SELECT migration from migrations');
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }
}
