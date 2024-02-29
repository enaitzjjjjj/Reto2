<?php

class CConexion {
    public function ConexionBD() {
        $host = "localhost";
        $dbname = "PeppoBytes";
        $username = "postgres";
        $password = "1234";
        
        try {
            $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            return null;
        }
    }
}

?>
