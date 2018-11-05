<?php
/**
 * Database
 * 
 * Connection to the database
 */
class Database {

    /**
     * Get the database connection
     * 
     * @return PDO object connection to the database server
     */
    public function getConn() {
        $db_host = 'localhost';
        $db_name = 'drumcondrafc';
        $db_user = 'drums_admin';
        $db_password = 'NDF9QRpEHixAQtIS';

        $dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_name;
        try {
            $db = new PDO($dsn, $db_user, $db_password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}