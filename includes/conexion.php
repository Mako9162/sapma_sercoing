<?php

    session_start();

    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try{
                Shell_exec("ssh -f -L 3307:localhost:3306 marco@192.168.1.101 -i /home/netveloper/.ssh/id_rsa");
                $config = [
                    'dsn' => 'mysql:host=127.0.0.1;port=3307;dbname=tareas',
                    'username' => 'sapmatareas',
                    'password' => '1Q2w3e4r.',
                ];
                $conectar = new PDO( $config['dsn'], $config['username'], $config['password']);
                $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conectar;
            }catch(Exception $e){
                print "¡Error BD!" . $e->getMessage(). "</br>";
                die();
            }
        }

        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }

        public function ruta(){
            return "http://localhost/sapma_sercoing/";
        }

    }

?>