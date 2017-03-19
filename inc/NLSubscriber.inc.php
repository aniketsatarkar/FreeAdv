<?php
/**
 * @author Aniket Satarkar <aniketsatarkar9@gmail.com>
 */

class NLSubscriber extends DBHelper
{
    /**
     * Get a newsletter subscriber from its id.
     * @param int $id
     * @return array|null
     * @throws Exception
     */
    public function getSubscriber($id)
    {
        $query = "SELECT * FROM nl_subscriber WHERE id = $id";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Get all newsletter subscribers from table.
     * @return array|null
     * @throws Exception
     */
    public function getSubscribers()
    {
        $query = "SELECT * FROM nl_subscriber";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Create a new newsletter subscriber in table.
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param string $mobile
     * @return bool
     * @throws Exception
     */
    public function createSubscriber($first_name, $last_name, $email, $mobile)
    {
        $query = "INSERT INTO nl_subscriber (first_name, last_name, email, mobile) VALUES ($first_name, $last_name, $email, $mobile)";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Update a newsletter subscriber details.
     * @param int $id
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param string $mobile
     * @return bool
     * @throws Exception
     */
    public function updateSubscriber($id, $first_name, $last_name, $email, $mobile)
    {
        $query = "UPDATE nl_subscriber SET first_name=$first_name, last_name=$last_name, email=$email, mobile=$mobile WHERE id=$id";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Get all active newsletter subscribers.
     * @return array|null
     * @throws Exception
     */
    public function getActiveSubscribers()
    {
        $query = "SELECT * FROM nl_subscriber WHERE is_subscribed='y'";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Get all inactive newsletter subscribers.
     * @return array|null
     * @throws Exception
     */
    public function getInactiveSubscribers()
    {
        $query = "SELECT * FROM nl_subscriber WHERE is_subscribed='n'";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Activate a newsletter subscription for an existing user.
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function activateSubscriber($id)
    {
        $query = "UPDATE nl_subscriber SET is_subscribed='y' WHERE id = $id";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Deactivate newsletter subscription for an existing user.
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function deactivateSubscriber($id)
    {
        $query = "UPDATE nl_subscriber SET is_subscribed='n' WHERE id = $id";
        return $this->getQueryResult($query, $this->getConnection());
    }

}// end of class.