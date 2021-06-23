<?php

namespace Application\core;

use PDO;
use PDOException;

class Database
{
    private $host = DB_HOST;
    private $db = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $table;
    private $port = DB_PORT;
    private $drive = DB_DRIVE;

    /**
     * @var PDO
     */
    private $connection;

    /**
     * @param string $table
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection()
    {
        try {
            $this->connection = new PDO($this->drive . ":host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    /**
     * @param string $query
     * @param array $params
     *
     * @return PDOStatement
     */
    public function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    /**
     * @param array $values
     *
     * @return int
     */
    public function insert(array $values): int
    {
        //DADOS DA QUERY
        $field = implode(",", array_keys($values));
        $binds = implode(",", array_pad([], count($values), '?'));

        //MONTA A QUERY
        $query = "INSERT INTO {$this->table} ({$field}) VALUE ({$binds})";

        //EXECUTA O INSERT
        $this->execute($query, array_values($values));

        //RETORNA O ID INSERIDO
        return $this->connection->lastInsertId();
    }

    /**
     * @param string|null $where
     * @param string|null $order
     * @param string|null $limit
     *
     * @return [type]
     */
    public function select($where = null, $order = null, $limit = null, $field = "*")
    {
        $where = strlen($where) ? "WHERE {$where}" : "";
        $order = strlen($order) ? "ORDER BY {$order}" : "";
        $limit = strlen($limit) ? "LIMIT {$limit}" : "";

        $query = "SELECT {$field} FROM {$this->table} " . $where . $order . $limit;

        return $this->execute($query);
    }

    /**
     * @param string $where
     * @param array $values
     *
     * @return bool
     */
    public function update(string $where, array $values)
    {
        $fields = implode("=?,", array_keys($values)) . '=?';

        $query = "UPDATE $this->table SET {$fields} where {$where}";

        $this->execute($query, array_values($values));
    }

    public function delete($where)
    {
        $query = "DELETE FROM $this->table where {$where}";

        $this->execute($query);
        return true;
    }

}
