<?php
namespace Mix\Core;

class RegistryConfig implements RegistryInterface
{
    protected $_data = array();

    /**
     * Save the specified value to the array registry
     */
    public function set($keyService, $nameService)
    {
        $this->_data[strtolower($keyService)] = $nameService;
    }

    /**
     * Get the specified value from the array registry
     */
    public function get($keyService)
    {
        $key = strtolower($keyService);
        return isset($this->_data[$keyService]) ?
               $this->_data[$keyService] :
               null;
    }

    /**
     * Clear the array registry
     */
    public function clear()
    {
        $this->_data = array();
    }
}
