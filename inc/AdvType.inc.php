<?php
/**
 * @author Aniket Satarkar <aniketsatarkar9@gmail.com>
 */


/**
 * @class AdvType
 */
class AdvType extends DBHelper
{

    /**
     * Default constructor.
     * @param mysqli|null $db_connection
     */
    public function __construct($db_connection)
    {
        parent::__construct($db_connection);
    }

    /**
     * Get Advertisement type using its id.
     * @param int $id
     * @return array|null
     * @throws Exception
     */
    public function getAdType($id)
    {
        $query = "SELECT ALL FROM adv_type WHERE id = $id";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Get all advertisement types including unavailable ones.
     * @return array|null
     * @throws Exception
     */
    public function getAdtTypes()
    {
        $query = "SELECT ALL FROM adv_type";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Get all available advertisement types from table.
     * @return array|null
     * @throws Exception
     */
    public function getAvailableAdTypes()
    {
        $query = "SELECT ALL FROM adv_type WHERE is_available = 'y'";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Get all unavailable advertisement types.
     * @return array|null
     * @throws Exception
     */
    public function getUnavailableAdTypes()
    {
        $query = "SELECT ALL FROM adv_type WHERE is_available = 'n'";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Get an advertisement type by its name.
     * @param string $type_name
     * @return array|null
     * @throws Exception
     */
    public function getAdTypeByName($type_name)
    {
        $query = "SELECT ALL FROM adv_type WHERE name = $type_name";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Create a new advertisement type in database.
     * @param string $type_name
     * @return bool
     * @throws Exception
     */
    public function createAdType($type_name)
    {
        $query = "INSERT INTO adv_type (name) VALUES ($type_name)";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Update an advertisement type in database.
     * @param int $type_id
     * @param string $type_name
     * @param string $is_available
     * @return bool
     * @throws Exception
     */
    public function updateAdType($type_id, $type_name, $is_available)
    {
        $query = "UPDATE adv_type SET name = $type_name, is_available=$is_available WHERE id = $type_id";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Set an advertisement type as unavailable using its id.
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function setAdTypeAvailable($id)
    {
        $query = "UPDATE adv_type SET is_available = 'y' WHERE id = $id";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Set an advertisement type ad available using its id.
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function setAdTypeUnavailable($id)
    {
        $query = "UPDATE adv_type SET is_available = 'n' WHERE id = $id";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Delete an advertisement from table using its id.
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function deleteAdType($id)
    {
        $query = "DELETE adv_type WHERE id = $id";
        return $this->getQueryResult($query, $this->getConnection());
    }

}// end of class.