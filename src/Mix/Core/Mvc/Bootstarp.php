<?php
namespace Mix\Core\Mvc;

use Mix\Core\Mvc\Config as Config;
use Mix\Core\Router\Router as Router;

// bootstrap class is make for trap first app

class Bootstarp
{
    public $config            = array();
    public $pathRoot          = null;
    public $urlBase           = null;
    public $urlComplate       = null;

    protected $protocol       = null;
    protected $httpRoot       = null;
    protected $httpFolder     = null;
    protected $urlAction      = null;
    protected $urlParams      = null;
    protected $urlArrayParams = array();
    protected $className      = null;
    protected $pathFolder     = null;

    protected $urlCountArrayParams = null;

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

        $this->configApp();
    }

    public function configApp()
    {
        new Config($this);
        new Router($this);

        return $this;
    }

    public function setUrlCountArrayParams($urlCountArrayParams = null)
    {
        $this->urlCountArrayParams = $urlCountArrayParams;
    }

    public function getUrlCountArrayParams()
    {
        return $this->urlCountArrayParams;
    }

    public function setPathFolder($pathFolder = null)
    {
        $this->pathFolder = $pathFolder;
    }

    public function getPathFolder()
    {
        return $this->pathFolder;
    }

    public function setClassName($className = null)
    {
        $this->className = $className;
    }

    public function getClassName()
    {
        return $this->className;
    }

    public function setUrlArrayParams($urlArrayParams = array())
    {
        $this->urlArrayParams = $urlArrayParams;
    }

    public function getUrlArrayParams()
    {
        return $this->urlArrayParams;
    }

    public function setUrlParams($urlParams = null)
    {
        $this->urlParams = $urlParams;
    }

    public function getUrlParams()
    {
        return $this->urlParams;
    }

    public function setUrlAction($urlAction = null)
    {
        $this->urlAction = $urlAction;
    }

    public function getUrlAction()
    {
        return $this->urlAction;
    }

    public function setHttpFolder($httpFolder = null)
    {
        $this->httpFolder = $httpFolder;
    }

    public function getHttpFolder()
    {
        return $this->httpFolder;
    }

    public function setHttpRoot($httpRoot = null)
    {
        $this->httpRoot = $httpRoot;
    }

    public function getHttpRoot()
    {
        return $this->httpRoot;
    }

    public function setProtocol($protocol = null)
    {
        $this->protocol = $protocol;
    }

    public function getProtocol()
    {
        return $this->protocol;
    }

    public function fileExists($file = null)
    {
        return $file !== null && is_file($file);
    }

    public function folderExists($folder = null)
    {
        return $folder !== null && is_dir($folder);
    }
}
