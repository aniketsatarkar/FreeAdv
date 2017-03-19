<?php
/**
 * @author Aniket Satarkar <aniketsatarkar9@mgail.com>
 */


class AdvContent extends DBHelper
{
    /**
     * Default constructor.
     * @param mysqli|null $db_connection
     */
    public function __construct($db_connection = null)
    {
        parent::__construct($db_connection);
    }

    /**
     * Get an advertisement content using its id.
     * @param int $id
     * @return array|null
     * @throws Exception
     */
    public function getContent($id)
    {
        $query = "SELECT ALL FROM adv_content WHERE id = $id";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Get advertisement content for a specific advertisement.
     * @param int $adv_id
     * @return array|null
     * @throws Exception
     */
    public function getContentByAdvId($adv_id)
    {
        $query = "SELECT ALL FROM adv_content WHERE adv_id = $adv_id";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Create an content for an advertisement.
     * @param int $adv_id
     * @param string $adv_logo
     * @param string $adv_image
     * @param string $adv_title
     * @param string $adv_text
     * @return bool
     * @throws Exception
     */
    public function createContent($adv_id, $adv_logo, $adv_image, $adv_title, $adv_text)
    {
        $query = "INSERT INTO adv_content (adv_id, adv_logo, adv_image, adv_title, adv_text) ".
                 " VALUES ($adv_id, $adv_logo, $adv_image, $adv_title, $adv_text)";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Update an advertisement content in database.
     * @param int $adv_id
     * @param string $adv_logo
     * @param string $adv_image
     * @param string $adv_title
     * @param string $adv_text
     * @return bool
     * @throws Exception
     */
    public function updateContent($adv_id, $adv_logo, $adv_image, $adv_title, $adv_text)
    {
        $query = "UPDATE adv_content SET adv_id = $adv_id, adv_logo=$adv_logo, ".
                 " adv_image=$adv_image, adv_title=$adv_title, adv_text=$adv_text";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Delete an advertisement content from database table.
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function deleteContent($id)
    {
        $query = "DELETE FROM adv_content WHERE id = $id";
        return $this->getQueryResult($query, $this->getConnection());
    }

}// end of class.