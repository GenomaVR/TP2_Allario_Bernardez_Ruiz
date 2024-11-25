<?php

    class Conexion{
        public $DB_SERVER = "localhost";
        public $DB_USER = "root"; //por defecto
        public $DB_PASS = "";
        public $DB_NAME = "usuario";
        public $DB_DSN = null;
        public ?PDO $db = null;

        public function __construct(){
            try {
                $this->DB_DSN = "mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_NAME.";charset=utf8mb4";
                $this->db = new PDO( $this->DB_DSN,$this->DB_USER,$this->DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION) );
            } catch(Exception $e) {
                header( "Location: ./views/404.php" );
                // die("Mensaje");
            }
        }
        public function getConexion(){
            return $this->db;
        }
    }