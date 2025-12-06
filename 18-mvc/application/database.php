<?php
    abstract class DataBase {
        protected static $conn = null;

        protected static function connect() {
            if (self::$conn == null) {
                try {
                    $host = 'localhost';
                    $dbnm = 'bdpkemon';
                    $user = 'root';
                    $pass = '';

                    self::$conn = new PDO("mysql:host=$host;dbname=$dbnm", $user, $pass);
                    self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    die("Connection error: ". $e->getMessage());
                }
            }
            return self::$conn;
        }
        
    }