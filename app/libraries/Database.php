<?php

/**
 * PDO Database class
 * Connect to Database
 * Create prepared statements
 * Bind values
 * Return rows and cells
 */
class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private static $statement;
    private $error;


    public function __construct()
    {
        // set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        //Create PDO Instance
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (\PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->dbname;
            echo $this->error;
        }
    }

    /**
     * Prepare statements with query
     */
    public function query($sql)
    {
        self::$statement = $this->dbh->prepare($sql);
    }

    /**
     * Bind values
     */
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        self::$statement->bindValue($param, $value, $type);
    }

    /**
     * Execute query
     */
    public static function execute()
    {
        return self::$statement->execute();
    }

    /**
     * Get results as array of objects
     */
    public static function all()
    {
        self::execute();
        
        return self::$statement->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get Single record as object
     */
    public static function first()
    {
        self::execute();

        return self::$statement->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Get row count
     */
    public function rowCount()
    {
        return self::$statement->rowCount();
    }
}
