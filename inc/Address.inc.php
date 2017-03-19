<?php
/**
 * @author Aniket Satarkar <aniketsatarkar9@gmail.com>
 */

/**
 * Class Address
 */
class Address extends DBHelper
{

    /**
     * @param mysqli|null $db_connection mysqli connection object.
     */
    public function __construct($db_connection=null)
    {
        parent::__construct($db_connection);
    }

    /**
     * Get address row by address id.
     * @param int $address_id
     * @return array|null
     * @throws Exception
     */
    public function getAddress($address_id)
    {
        $query = "SELECT * FROM address WHERE id=$address_id";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Create a new address row in database table.
     * @param string $city
     * @param string $state
     * @param null|string $line1
     * @param null|string $line2
     * @param null|string $pin
     * @return bool
     * @throws Exception
     */
    public function createAddress($city, $state, $line1=null, $line2=null, $pin=null)
    {
        $query = "INSERT INTO address (line1, line2, city, state, pin) VALUES ($line1, $line2, $city, $state, $pin)";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Update an address row in database.
     * @param int $address_id
     * @param string $city
     * @param string $state
     * @param null|string $line1
     * @param null|string $line2
     * @param null|string $pin
     * @return bool
     * @throws Exception
     */
    public function updateAddress($address_id, $city, $state, $line1=null, $line2=null, $pin=null)
    {
        $query = "UPDATE address set line1=$line1, line2=$line2, city=$city, state=$state, pin=$pin WHERE id = $address_id";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Delete an address row from database.
     * @param int $address_id
     * @return bool
     * @throws Exception
     */
    public function deleteAddress($address_id)
    {
        $query = "DELETE address WHERE id=$address_id";
        return $this->getQueryResult($query, $this->getConnection());
    }

}// end of class.