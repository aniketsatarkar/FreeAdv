<?php

include_once '../inc/Database.inc.php';

class DatabaseTest extends PHPUnit_Framework_TestCase
{
    public function testConstructorParameters()
    {
        $database = new Database('localhost', 'root', 'root', 'freeadv', '3306');

        $this->assertAttributeEquals('localhost', 'host', $database);
        $this->assertAttributeEquals('root', 'user', $database);
        $this->assertAttributeEquals('root', 'password', $database);
        $this->assertAttributeEquals('freeadv', 'database', $database);
        $this->assertAttributeEquals('3306', 'socket', $database);
    }

    public function testGetHostFunction()
    {
        $database = new Database('localhost');
        $this->assertEquals('localhost', $database->getHost());
    }

    public function testSetCredentialsFunction()
    {
        $database = new Database();
        $database->setCredentials('localhost', 'root','root', 'freeadv', '3306');

        $this->assertAttributeEquals('localhost', 'host', $database);
        $this->assertAttributeEquals('root', 'user', $database);
        $this->assertAttributeEquals('root', 'password', $database);
        $this->assertAttributeEquals('freeadv', 'database', $database);
        $this->assertAttributeEquals('3306', 'socket', $database);
    }

    public function testCreateConnectionFunction()
    {
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $database = 'freeadv';
        $socket = '3306';

        $db_conn = mysqli_connect($host, $user, $pass, $database, $socket);
        $database_ = new Database();

        $this->assertEquals($db_conn, $database_->createConnection($host, $user, $pass, $database, $socket));
    }

    public function testConnectFunction()
    {
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $database = 'freeadv';
        $socket = '3306';

        $db_conn = mysqli_connect($host, $user, $pass, $database, $socket);
        $database_ = new Database();
        $database_->setCredentials($host, $user, $pass, $database, $socket);

        $this->assertEquals($db_conn, $database_->connect());
    }

    public function testCloseConnectionFunction()
    {
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $database = 'freeadv';
        $socket = '3306';

        $db_conn = mysqli_connect($host, $user, $pass, $database, $socket);
        $db_conn->close();

        $database_ = new Database();
        $database_->setCredentials($host, $user, $pass, $database, $socket);
        $database_->connect();

        $this->assertAttributeEquals($db_conn, 'db_conn', $database_);
    }

}// end of test.
 