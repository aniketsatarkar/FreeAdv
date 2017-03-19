<?php
/**
 * @author Aniket Satarkar <aniketsatarkar9@gmail.com>
 */


class AdvSpan extends DBHelper
{
    /**
     * Default constructor.
     * @param mysqli|null $db_connection
     */
    public function __construct($db_connection=null)
    {
        parent::__construct($db_connection);
    }

    /**
     * Get an advertisement span row from the database using its id.
     * @param int $span_id
     * @return array|null
     * @throws Exception
     */
    public function getAdvSpan($span_id)
    {
        $query = "SELECT ALL FROM adv_span WHERE  id = $span_id";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Get span for a specific advertisement.
     * @param int $adv_id
     * @return array|null
     * @throws Exception
     */
    public function getSpanByAdvId($adv_id)
    {
        $query = "SELECT ALL FROM adv_span WHERE adv_id = $adv_id";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Create a span for an advertisement in database.
     * @param int $adv_id
     * @param datetime $date_from
     * @param datetime $date_to
     * @return bool
     * @throws Exception
     */
    public function createSpan($adv_id, $date_from, $date_to)
    {
        $query = "INSERT INTO adv_span (adv_id, date_from, date_to) VALUES ($adv_id, $date_from, $date_to)";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Update a span entry in database.
     * @param int $span_id
     * @param int $adv_id
     * @param datetime $date_from
     * @param datetime $date_to
     * @return bool
     * @throws Exception
     */
    public function updateSpan($span_id, $adv_id, $date_from, $date_to)
    {
        $query = "UPDATE adv_span SET adv_id=$adv_id, date_from=$date_from, date_to=$date_to WHERE id=$span_id";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Delete a span from the database.
     * @param int $span_id
     * @return bool
     * @throws Exception
     */
    public function deleteSpan($span_id)
    {
        $query = "DELETE FROM adv_span WHERE id=$span_id";
        return $this->getQueryResult($query, $this->getConnection());
    }

}// end of class.