<?php
define('DB_HOST', 'mysql-2628de66-shoes-website.l.aivencloud.com');
define('DB_PORT', '12196');
define('DB_NAME', 'stridehub');
define('DB_USER', 'avnadmin');
define('DB_PASS', 'AVNS_CkqJP70s48bHC_GQ6rI');

function getDBConnection() {
    static $conn = null;
    if ($conn !== null) {
        return $conn;
    }

    try {
        $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8mb4";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        if (defined('PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT')) {
            $options[PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT] = false;
        }

        $conn = new PDO($dsn, DB_USER, DB_PASS, $options);
    } catch (PDOException $e) {
        error_log("Database connection failure: " . $e->getMessage());
        return null;
    }

    return $conn;
}
