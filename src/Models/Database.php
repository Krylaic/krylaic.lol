<?php
namespace App\Models;

use mysqli;

class Database {
    private static $instance = null;

    public static function getConnection() {
        if (self::$instance === null) {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            
            try {
                self::$instance = new mysqli(
                    $_ENV['DB_HOST'],
                    $_ENV['DB_USER'],
                    $_ENV['DB_PASS'],
                    $_ENV['DB_NAME'],
                    $_ENV['DB_PORT']
                );
                
                self::$instance->set_charset("utf8mb4");
                
            } catch (\mysqli_sql_exception $e) {
                die("error connecting to the database: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}