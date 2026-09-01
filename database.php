<?php

class Database {
    private $host = "localhost";
    private $db_name = "appweb2026";
    private $username = "root";     
    private $password = "";
    
    public function conectar(){
        $conexion = "mysql:host = {$this->host};dbname={$this->db_name}";

        $opciones = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        return new PDO(
            $conexion,
            $this->username,
            $this->password,
            $opciones
        );
    }
    }
