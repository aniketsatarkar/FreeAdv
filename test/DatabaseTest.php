<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 20/03/2017
 * Time: 2:44 AM
 */

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

}// end of test.
 