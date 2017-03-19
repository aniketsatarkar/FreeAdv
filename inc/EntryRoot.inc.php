<?php
/**
 * @author Aniket Satarkar <aniketsatarkar9@gmail.com>
 */

/**
 * Function to automatically load class files as they occur.
 * @param string $class name of class that need to be included.
 */
function __autoload($class)
{
    include_once $class . '.inc.php';
}