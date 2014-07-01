<?php
namespace Mix\Core\Service;

// check model yg dibutuhkan
// check view yg dibutuhkan

class ServiceManager
{
    protected $config   = array();
    protected $services = array();

    public function __construct(&$router)
    {
    }

    public function setService($serviceName, ServiceInterface $service)
    {
        $this->services[$serviceName] = $service;
    }

    public function getService($serviceName)
    {
        if (!isset($this->services[$serviceName])
        || empty($this->services[$serviceName])) {

            $serviceList = $this->config['service'];

            if (isset($serviceList['factories'][$serviceName])) {
                $this->services[$serviceName] = $serviceList['factories'][$serviceName]::createService($this);
            } elseif (isset($serviceList['invokables'][$serviceName])) {
                $this->services[$serviceName] = new $serviceList['invokables'][$serviceName]($this);
            } else {
                throw new \Exception("Service dengan nama \"{$serviceName}\" tidak ditemukan!");
            }
        }

        return $this->services[$serviceName];
    }
}
