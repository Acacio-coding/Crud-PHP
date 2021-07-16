<?php

namespace App\db;

use \PDO;
use PDOException;

class Database {
    const HOST = 'localhost';
    const DBNAME = 'db_crud_php';
    const USER = 'root';
    const PASSWORD = '0501';

    private $table;
    private $connection;

    public function __construct($table = null) {
        $this -> table = $table;
        $this -> setConnection();
    }

    private function setConnection() {
        try {
            $this -> connection = new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME, self::USER, self::PASSWORD, 
            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $this -> connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            error_log($e -> getMessage());
            header('location: /includes/messages/error.php');
            exit;
        }
    }

    public function executeQuery($query, $parameters = []) {
        try {
            $statement = $this -> connection -> prepare($query);
            $statement -> execute($parameters);
            return $statement;
            
        }catch(PDOException $e) {
            error_log($e -> getMessage());
        }
    }

    public function insert($values) {
        $fields = array_keys($values);

        $positions = array_pad([], count($fields),'?');

        $query = 'INSERT INTO '.$this -> table.'('.implode(',', $fields).') VALUES ('.implode(',', $positions).')';
        
        $this -> executeQuery($query, array_values($values));
        

        return $this -> connection -> lastInsertId();
    }


    public function select($where = null, $order = null, $limit = null, $fields = '*', $function = null) {
        if (strlen($where) != 0)
            $where = 'WHERE '.$where;
        else 
            $where = '';
        
        if (strlen($order) != 0)
            $order = 'ORDER BY '.$order;
        else 
            $order = '';

        if (strlen($limit) != 0)
            $limit = 'LIMIT '.$limit;
        else 
            $limit = '';

        $query = 'SELECT '.$fields.' FROM '.$this -> table.' '.$where.' '.$order.' '.$limit;

        return $this -> executeQuery($query);
    }

    public function update($where, $values) {
        $fields = array_keys($values);

        $query = 'UPDATE '.$this -> table.' SET '.implode('=?,' ,$fields).'=? WHERE '.$where;

        $this -> executeQuery($query, array_values($values));

        return true;
    }

    public function delete($where) {
        $query = 'DELETE FROM '.$this -> table.' WHERE '.$where;
        return $this -> executeQuery($query);;
    }
}