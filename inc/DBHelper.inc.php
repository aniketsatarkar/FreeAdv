<?php

/**
 * @author Aniket Satarkar <aniketsatarkar9@gmail.com>
 */

/**
 * Class DBHelper
 * Abstract class that provide database helper function.
 */
abstract class DBHelper
{
    /**
     * Database connection object.
     * @var null | mysqli
     */
    private $db_conn = null;

    protected function __construct($db_connection=null)
    {
        $this->setConnection($db_connection);
    }

    /**
     * Set mysqli connection object.
     * @param mysqli $db_connection
     */
    public function setConnection($db_connection)
    {
        $this->db_conn = $db_connection;
    }

    /**
     * Getter method for mysqli connection.
     * @return mysqli|null
     */
    protected function getConnection()
    {
        return $this->db_conn;
    }

    /**
     * To check if the query result array is null or empty.
     * @param array $resultArray
     * @return bool
     */
    protected function checkResultArray($resultArray)
    {
        if($resultArray == null || sizeof($resultArray) == 0)
            return false;
        else
            return true;
    }

    /**
     * To get associative result array from query result.
     * @param mysqli_result $result
     * @return array|null
     * @throws Exception
     */
    protected function getResultArray($result)
    {
        if($result == null)
            throw new Exception("Query Result is null");
        else
        {
            $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if($this->checkResultArray($resultArray))
            {
                if(sizeof($resultArray) == 1)
                    return $resultArray[0];
                else
                    return $resultArray;
            }
            else
                return null;
        }
    }

    /**
     * To get if query result is a success.
     * @param mysqli_result $result
     * @return bool
     */
    protected function isSuccess($result)
    {
        if($result != null)
            return true;
        else
            return false;
    }

    /**
     * Execute query.
     * @param string $query
     * @param mysqli $db_conn
     * @return array|null
     * @throws Exception
     */
    protected function getQueryData($query, $db_conn)
    {
        if($query == null || $db_conn == null)
            throw new Exception("Argument is null");
        else
        {
            $result = mysqli_query($db_conn, $query);
            return $this->getResultArray($result);
        }
    }

    /**
     * Execute sql query and return true on success
     * otherwise false.
     * @param string $query
     * @param mysqli $db_conn
     * @return bool
     * @throws Exception
     */
    protected function getQueryResult($query, $db_conn)
    {
        if($query == null || $db_conn == null)
            throw new Exception("Argument is null");

        $_result = mysqli_query($db_conn, $query);
        return ($_result != null)? true : false;
    }

}// end of class.