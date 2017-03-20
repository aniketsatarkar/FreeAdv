<?php

/**
 * @author Aniket Satarkar <aniketsatarkar9@gmail.com>
 */

/**
 * Class Database
 * Class that manages the database credentials and connection.
 */
class Database
{
    /**
     * Database Connection mysqli object.
     * @var mysqli mysqli connection object.
     */
    private $db_conn = null;

    /**
     * Database host address.
     * @var string host address for database server.
     */
    private $host     = null;

    /**
     * Database username.
     * @var string database username.
     */
    private $user     = null;

    /**
     * Database password.
     * @var string password string for database.
     */
    private $password = null;

    /**
     * Database name.
     * @var string database name string.
     */
    private $database = null;

    /**
     * Database socket.
     * @var string socket or port of database server.
     */
    private $socket   = null;

    /**
     * Constructor to create a DBCred instance.
     * @param string|null $host
     * @param string|null $user
     * @param string|null $password
     * @param string|null $database
     * @param string|null $socket
     */
    public function __construct($host=null, $user=null, $password=null, $database=null, $socket=null)
    {
        $this->setCredentials($host, $user, $password, $database, $socket);
    }

    /**
     * Get host connection string.
     * @return string database server host address.
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Get database username.
     * @return string database username.
     */
    public function getUser()
    {
        return $this->host;
    }

    /**
     * Get database password.
     * @return string password for database.
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get database name.
     * @return string database schema name.
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * Get database socket.
     * @return string
     */
    public function getSocket()
    {
        return $this->socket;
    }

    /**
     * Get database connection.
     * @return mysqli
     */
    public function getConnection()
    {
        return $this->db_conn;
    }

    /**
     * Get if database is connected or not.
     * @return bool
     */
    public function isConnected()
    {
        return ($this->db_conn != null)? true : false;
    }

    /**
     * Set database connection credentials.
     * @param string|null $host
     * @param string|null $user
     * @param string|null $password
     * @param string|null $database
     * @param string|null $socket
     */
    public function setCredentials($host, $user, $password, $database, $socket=null)
    {
        $this->host     = $host;
        $this->user     = $user;
        $this->password = $password;
        $this->database = $database;
        $this->socket   = $socket;
    }

    /**
     * Get mysqli database connection.
     * @param string $host
     * @param string $user
     * @param string $password
     * @param string $database
     * @param string|null $socket
     * @return mysqli|null
     */
    public function createConnection($host, $user, $password, $database, $socket=null)
    {
        $this->setCredentials($host, $user, $password, $database, $socket);
        $this->db_conn = mysqli_connect($host, $user, $password, $database, $socket);

        return $this->db_conn;
    }

    /**
     * Connect to database with instance credentials and return connection object.
     * @return mysqli connection object.
     */
    public function connect()
    {
        $this->db_conn = mysqli_connect($this->host, $this->user, $this->password, $this->database, $this->socket);
        return $this->db_conn;
    }

    /**
     * Close database connection.
     * @return bool
     */
    public function closeConnection()
    {
        if($this->db_conn != null)
            return $this->db_conn->close();

        return false;
    }

    /**
     * Destruct Database object and close database connection.
     */
    public function __destruct()
    {
        $this->closeConnection();
    }

}// end of class.