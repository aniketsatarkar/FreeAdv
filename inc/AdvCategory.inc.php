<?php
/**
 * @author Aniket Satarkar <aniketsatarkar9@gmail.com>
 */


class AdvCategory extends DBHelper
{
    /**
     * Get a category by its id.
     * @param int $id
     * @return array|null
     * @throws Exception
     */
    public function getCategory($id)
    {
        $query = "SELECT ALL FROM adv_category WHERE id = $id";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Get a category using its name.
     * @param string $name
     * @return array|null
     * @throws Exception
     */
    public function getCategoryByName($name)
    {
        $query = "SELECT ALL FROM adv_category WHERE name = $name";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Create a new category in database.
     * @param string $name
     * @return bool
     * @throws Exception
     */
    public function createCategory($name)
    {
        $query = "INSERT INTO adv_category (name) VALUES ($name)";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Update a category in table.
     * @param int $id
     * @param string $name
     * @return array|null
     * @throws Exception
     */
    public function updateCategory($id, $name)
    {
        $query = "UPDATE adv_category SET name = $name WHERE id = $id";
        return $this->getQueryData($query, $this->getConnection());
    }

    /**
     * Set a category as available.
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function setCategoryAvailable($id)
    {
        $query = "UPDATE adv_category SET is_available = 'y' WHERE id = $id";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Get a category as unavailable.
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function setCategoryUnavailable($id)
    {
        $query = "UPDATE adv_category SET is_available = 'n' WHERE id = $id";
        return $this->getQueryResult($query, $this->getConnection());
    }

    /**
     * Delete a category from database.
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function deleteCategory($id)
    {
        $query = "DELETE FROM adv_category WHERE id=$id";
        return $this->getQueryResult($query, $this->getConnection());
    }

}// end of class.