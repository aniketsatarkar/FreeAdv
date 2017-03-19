<?php
/**
 * @author Aniket Satarkar <aniketsatarkar9@gmail.com>
 */

class AdvTag extends DBHelper
{
    /**
     * Get an advertisement tag using its id.
     * @param int $tag_id
     * @return bool
     * @throws Exception
     */
    public function getTag($tag_id)
    {
        $query  = "SELECT * FROM adv_tag WHERE id = $tag_id";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Get all tags for an advertisement using advertisement id.
     * @param int $adv_id
     * @return array|null
     * @throws Exception
     */
    public function getTags($adv_id)
    {
        $query = "SELECT * FROM adv_tag WHERE adv_id = $adv_id";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Create a tag for an advertisement.
     * @param int $adv_id
     * @param string $tag
     * @return bool
     * @throws Exception
     */
    public function createTag($adv_id, $tag)
    {
        $query = "INSERT INTO adv_tag (adv_id, tag) VALUES ($adv_id, $tag)";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Delete a tag from the table.
     * @param int $tag_id
     * @return bool
     * @throws Exception
     */
    public function deleteTag($tag_id)
    {
        $query = "DELETE FROM adv_tag WHERE id = $tag_id";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Update an existing tag in database.
     * @param int $tag_id
     * @param int $adv_id
     * @param string $tag
     * @return bool
     * @throws Exception
     */
    public function updateTag($tag_id, $adv_id, $tag)
    {
        $query = "UPDATE adv_tag SET adv_id = $adv_id, tag = $tag WHERE id = $tag_id";
        return $this->getQueryResult($query, $this->getConnection());
    }

}// end of class.