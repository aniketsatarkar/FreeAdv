<?php
/**
 * @author Aniket Satarkar <aniketsatarkar9@gmail.com>
 */

class MessageToAdvertiser extends DBHelper
{
    /**
     * Get a message using a message id.
     * @param int $msg_id
     * @return array|null
     * @throws Exception
     */
    public function getMessageById($msg_id)
    {
        $query = "SELECT * FROM message_to_advertiser WHERE id = $msg_id";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Get all messages for an advertiser.
     * @param $advertiser_id
     * @return array|null
     * @throws Exception
     */
    public function getMessages($advertiser_id)
    {
        $query = "SELECT * FROM message_to_advertiser WHERE to_advertiser = $advertiser_id";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Get all messages from a particular user for an advertiser.
     * @param int $advertiser_id
     * @param int $user_id
     * @return array|null
     * @throws Exception
     */
    public function getMessagesFromUser($advertiser_id, $user_id)
    {
        $query = "SELECT * FROM message_to_advertiser WHERE to_advertiser = $advertiser_id AND from_user = $user_id";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Send a message to advertiser from a user.
     * @param int $to_advertiser
     * @param int $from_user
     * @param string $message
     * @param null|string $subject
     * @return bool
     * @throws Exception
     */
    public function sendMessage($to_advertiser, $from_user, $message, $subject=null)
    {
        $query = "INSERT INTO message_to_advertiser (from_user, to_advertiser, subject, message)" .
                 "VALUES ($from_user, $to_advertiser, $subject, $message)";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Set a message as seen.
     * @param int $msg_id
     * @return bool
     * @throws Exception
     */
    public function setMessageSeen($msg_id)
    {
        $query = "UPDATE message_to_advertiser SET is_seen = 'y' WHERE $msg_id";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Delete a message from table.
     * @param int $msg_id
     * @return bool
     * @throws Exception
     */
    public function deleteMessage($msg_id)
    {
        $query = "DELETE FROM message_to_advertiser WHERE id = $msg_id";
        return $this->getQueryResult($query, $this->getConnection());
    }

}// end of class.