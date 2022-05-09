<?php   

class database{

    private $host;
    private $username;
    private $password;
    private $dbh;

    public function __construct() 
    {
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->database = 'hotel';

        try {
            $dsn = "mysql:host=$this->database";
            $this->dbh = new PDO($dsn, $this->username, $this->password);
        } catch (PDOException $exception) {
            die("connection failed!->" . $exception->getMessage());
        }
    }

}
?>