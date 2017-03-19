<?php
/**
 * @author Aniket Satarkar <aniketsatarkar9@gmail.com>
 */

class GuestResponse extends DBHelper
{
    /**
     * Get a response using response id.
     * @param int $id
     * @return array|null
     * @throws Exception
     */
    public function getResponse($id)
    {
        $query = "SELECT * FROM guest_response WHERE id = $id";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Get all responses from the table for a particular advertisement.
     * @param int $adv_id
     * @return array|null
     * @throws Exception
     */
    public function getResponseFromAd($adv_id)
    {
        $query = "SELECT * FROM guest_response WHERE adv_id = $adv_id";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Create a response for an advertisement.
     * @param int $adv_id
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param string $mobile
     * @param string $subject
     * @param string $message
     * @return bool
     * @throws Exception
     */
    public function createResponse($adv_id, $first_name, $last_name, $email, $mobile, $subject, $message)
    {
        $query = "INSERT INTO guest_response  (adv_id, first_name, last_name, email, mobile, subject, message) ".
                 " VALUES ($adv_id, $first_name, $last_name, $email, $mobile, $subject, $message)";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Delete a response from table using its id.
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function deleteResponse($id)
    {
        $query = "DELETE FROM guest_response WHERE id = $id";
        return $this->getQueryResult($query, $this->getConnection());
    }

}// end of class.