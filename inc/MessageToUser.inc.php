<?php
/**
 * @author Aniket Satarkar <aniketsatarkar9@gmail.com>
 */

class MessageToUser Extends DBHelper
{
    /**
     * Get a message using its message id.
     * @param int $msg_id
     * @return array|null
     * @throws Exception
     */
    public function getMessage($msg_id)
    {
        $query = "SELECT * FROM message_to_user WHERE id = $msg_id";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Get all messages for a particular user.
     * @param int $to_user
     * @return array|null
     * @throws Exception
     */
    public function getMessages($to_user)
    {
        $query = "SELECT * FROM message_to_user WHERE to_user = $to_user";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Get All messages from an advertiser to a particular user.
     * @param int $to_user
     * @param int $from_advertiser
     * @return array|null
     * @throws Exception
     */
    public function getMessagesFromAdvertiser($to_user, $from_advertiser)
    {
        $query = "SELECT * FROM message_to_user WHERE from_advertiser = $from_advertiser AND to_user = $to_user";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Send message to the user from an advertiser.
     * @param int $to_user
     * @param int $from_advertiser
     * @param string $message
     * @param null|string $subject
     * @return bool
     * @throws Exception
     */
    public function sendMessage($to_user, $from_advertiser, $message, $subject=null)
    {
        $query = "INSERT INTO message_to_user (from_advertiser, to_user, subject, message) VALUES ($from_advertiser, $to_user, $subject, $message)";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Set a message as seen.
     * @param int $msg_id
     * @return bool
     * @throws Exception
     */
    public function setMessageSeen($msg_id )
    {
        $query = "UPDATE message_to_user SET is_seen ='y' WHERE id = $msg_id";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Delete a message from the table.
     * @param int $msg_id
     * @return bool
     * @throws Exception
     */
    public function deleteMessage($msg_id)
    {
        $query = "DELETE FROM message_to_user WHERE id = $msg_id";
        return $this->getQueryResult($query, $this->getConnection());
    }

}// end of class.