<?php
    namespace app\entity;

    use App\db\Database;
    use \PDO;

    class Client {
        public $id;
        public $name;
        public $identifier;
        public $account;

        public function registerClient() {
            $database = new Database('tb_clients');
            $this -> id = $database -> insert([
                'name' => $this -> name,
                'identifier' => $this -> identifier,
                'account' => $this -> account
            ]);

            if($this -> id != 0) 
                return true;
            else
                return false;
        }

        public function updateClient() {
            $database = new Database('tb_clients');
            $statement = $database -> update('id='.$this -> id, [
                'name' => $this -> name,
                'identifier' => $this -> identifier
            ]);
            
            if($statement != 0) 
                return true;
            else
                return false;   
        }

        public function updateClientAccount() {
            $database = new Database('tb_clients');
            $statement =  $database -> update('id='.$this -> id, [
                'account' => $this -> account
            ]);

            if($statement != 0) 
                return true;
            else
                return false;   
        }

        public function removeClient() {
            $database = new Database('tb_clients');
            return $database -> delete('id='.$this -> id);
        }

        public static function getClients($where = null, $order = null, $limit = null) {
            $database = new Database('tb_clients');
            return $database -> select($where, $order, $limit) -> fetchAll(PDO::FETCH_CLASS, self::class);
        }

        public static function getClient($client_id) {
            $database = new Database('tb_clients');
            return $database -> select('id='.$client_id) -> fetchObject(self::class);
        } 
    }