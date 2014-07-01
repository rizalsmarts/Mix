<?php
namespace Mix\Core;

use Mix\Core\RegistryInterface;

class Registry
{
    protected $_registryBackend;

    /**
     * Constructor
     */
    public function __construct(RegistryInterface $registryBackend)
    {
        $this->_registryBackend = $registryBackend;
    }

    /**
     * Save the specified element to the registry
     */
    public function set($keyService, $nameService)
    {
        $this->_registryBackend->set($keyService, $nameService);
        return $this;
    }

    /**
     * Get the specified element from the registry
     */
    public function get($keyService)
    {
        return $this->_registryBackend->get($keyService);
    }

    /**
     * Clear the registry
     */
    public function clear()
    {
        $this->_registryBackend->clear();
    }

    public function bootstrap()
    {
        return $this;
    }

    public function run()
    {
        $controller = new ControllerManager($this->serviceManager);
        $view       = $controller->getResult();

        $response = $this->serviceManager->getService('response');
        $response->setView($view);

        return $response;
    }
}
