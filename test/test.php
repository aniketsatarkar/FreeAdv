<?php

    include_once 'inc/EntryRoot.inc.php';

    // Database connection credentials.
    $host     = "localhost";
    $user     = "root";
    $pass     = "root";
    $database = "freeadv";
    $socket   = "3306";

    // create a database object to manage the connection.
    $db = new Database();
    $db->createConnection($host, $user, $pass, $database, $socket);

    // an Address object to work with Address table in database.
    $address = new Address($db->getConnection());
    print_r($address->getAddress(1));