<?php 

    class Database {
        private $server = "mysql:host=localhost;dbname=new_tut";
        private $user = "root";
        private $password = "";
        private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
        protected $connection = null;

        public function get_connection() {
            try{
                $connection = new PDO($this->server, $this->user, $this->password, $this->options);
                return $this->connection;
            }catch(PDOExcetion $e){
                echo 'ERROR:' . $e.getMessage();
            }
        }
    }

    $mydb = new Database();
    // $mydb->get_connection();
?>