<?php
    namespace app\entity;

    use App\db\Database;
    use \PDO;

    class Payment {
        public $id;
        public $method;
        public $date;
        public $amount;
        public $client_id;
        public $status;

        public function addPayment() {
            date_default_timezone_set("America/Sao_Paulo");
            $this -> date = date('Y-m-d');

            $database = new Database('tb_payments');
              
            $this -> id = $database -> insert([
                'method' => $this -> method,
                'date' => $this -> date,
                'amount' => $this -> amount,
                'client_id' => $this -> client_id,
                'status' => $this -> status
            ]); 

            if($this -> id != 0) 
                return true;
            else
                return false;
        }

        public function updatePayment() {
            $database = new Database('tb_payments');
            $statement =  $database -> update('id='.$this -> id, [
                'method' => $this -> method,
                'amount' => $this -> amount
            ]);    

            if($statement != 0) 
                return true;
            else
                return false;   
        }

        public function removePayment() {
            $database = new Database('tb_payments');
            return $database -> delete('id='.$this -> id);
        }

        public static function getAllPayments($order = null, $limit = null) {
            $database = new Database('tb_payments');
            return $database -> select($order, $limit) -> fetchAll(PDO::FETCH_CLASS, self::class);
        }

        public static function getOnePayment($payment_id) {
            $database = new Database('tb_payments');
            return $database -> select('id='.$payment_id) -> fetchObject(self::class);
        } 

        public static function getAllPaymentsFromOneClient($client_id) {
            $database = new Database('tb_payments');
            return $database -> select('client_id='.$client_id) -> fetchAll(PDO::FETCH_CLASS, self::class);
        } 
    }