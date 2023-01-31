<?php
require_once('./app/config/init.php');
class DataBaseConnection
{
    public static $instance;
    /**
     * If $instance exists return $instance else create a new connection and return PDO connection
     * @return PDO
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::createConnection();
        }

        return self::$instance;
    }

    /**
     * create a new database connection
     *
     * @return void
     */

    private static function createConnection(): void
    {
        try {

            $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE_NAME, USERNAME, PASSWORD, [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
            self::$instance = $pdo;
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }

}
?>