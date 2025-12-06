<?php
    class Model extends DataBase {
        
        public function get($table) {
            try {
                $conn = self::connect();
                $sql = "SELECT * FROM $table";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return [];
            }
        }
        
    }