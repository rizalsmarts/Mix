<?php
namespace Mix\Core\Mvc;

use Mix\Core\Mvc\Config as Config;
use Mix\Core\Router\Router as Router;

// bootstrap class is make for trap first app

class Bootstarp
{
    public $config         = array();
    public $protocol       = null;
    public $httpRoot       = null;
    public $httpFolder     = null;
    public $pathRoot       = null;
    public $urlBase        = null;
    public $urlComplate    = null;
    public $urlAction      = null;
    public $urlParams      = null;
    public $urlArrayParams = array();
    public $className      = null;
    public $pathFolder     = null;

    public $urlCountArrayParams = null;

    public function __construct(
        array $config = array(),
        $type         = "apps",
        $pathRoot     = null,
        $urlBase      = null,
        $urlComplate  = null
    ) {
        $this->config      = $config;
        $this->pathRoot    = $pathRoot;
        $this->urlBase     = $urlBase;
        $this->urlComplate = $urlComplate;

        $this->routingApp();
    }

    private function configApp()
    {
        return new Config($this);
    }

    private function routingApp()
    {
        $this->configApp();

        // melakukan routing controller, model dan view
        // check controller yg dibutuhkan
        // check model yg dibutuhkan
        // check view yg dibutuhkan
        // output run aplikasi tersebut

        return new Router($this);
    }
}
