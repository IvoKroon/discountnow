<?php

class Db
{
    private $host, $username, $password, $database;
    /**
     * @var \PDO
     */
    protected $connection;
    public function __construct($host,$username,$password,$database)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->connect();
    }

    private function connect()
    {
        try{
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

            $this->connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->username, $this->password, $pdo_options);

        }catch (PDOException $e){
            echo 'ERROR'. $e->getMessage();
        }
    }

}