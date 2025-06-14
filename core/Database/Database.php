<?php

namespace Core\Database;

use PDO;

class Database
{
    private static Database|null $instance = null;
    private PDO $connect;
    private \PDOStatement $stmt;

    private function __construct()
    {
    }

    private function __clone(): void
    {
    }

    public function __wakeup(): void
    {
    }

    public static function getInstance(): self
    {
        if (Database::$instance === null) {
            Database::$instance = new self();
        }

        return Database::$instance;
    }

    public function getConnect(array $databaseSettings): self
    {
        $dsn = "mysql:host={$databaseSettings['host']};dbname={$databaseSettings['database']};charset={$databaseSettings['charset']}";
        try {
            $this->connect = new PDO($dsn, $databaseSettings['username'], $databaseSettings['password'], $databaseSettings['options']);
            return $this;
        } catch (\PDOException $e) {
            errorLog($e->getMessage());
            die;
        }
    }

    public function query(string $query, array $params = []): self
    {
        try {
            $this->stmt = $this->connect->prepare($query);
            $this->stmt->execute($params);
            return $this;
        } catch (\PDOException $e) {
            errorLog($e->getMessage());
            die;
        }
    }
}