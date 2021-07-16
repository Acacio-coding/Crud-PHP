<?php
    namespace app\entity;

    use App\db\Database;
    use \PDO;

    class Purchase {
        public $id;
        public $description;
        public $date;
        public $value;
        public $client_id;
        public $status;

        public function addPurchase() {
            date_default_timezone_set("America/Sao_Paulo");
            $this -> date = date('Y-m-d');

            $database = new Database('tb_purchases');
              
            $this -> id = $database -> insert([
                'description' => $this -> description,
                'date' => $this -> date,
                'value' => $this -> value,
                'client_id' => $this -> client_id,
                'status' => $this -> status
            ]); 

            if($this -> id != 0) 
                return true;
            else
                return false;
        }

        public function updatePurchase() {
            $database = new Database('tb_purchases');
            $statement = $database -> update('id='.$this -> id, [
                'description' => $this -> description,
                'value' => $this -> value
            ]); 

            if($statement != 0) 
                return true;
            else
                return false;   
        }

        public function removePurchase() {
            $database = new Database('tb_purchases');
            return $database -> delete('id='.$this -> id);
        }

        public static function getAllPurchases($order = null, $limit = null) {
            $database = new Database('tb_purchases');
            return $database -> select($order, $limit) -> fetchAll(PDO::FETCH_CLASS, self::class);
        }

        public static function getOnePurchase($purchase_id) {
            $database = new Database('tb_purchases');
            return $database -> select('id='.$purchase_id) -> fetchObject(self::class);
        } 

        public static function getAllPurchasesFromOneClient($client_id) {
            $database = new Database('tb_purchases');
            return $database -> select('client_id='.$client_id) -> fetchAll(PDO::FETCH_CLASS, self::class);
        } 

    }
    
