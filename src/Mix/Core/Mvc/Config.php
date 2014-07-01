<?php
namespace Mix\Core\Mvc;

// config class is make for Configuration if config not full set

class Config
{
    protected $bootstrap = null;

    public function __construct(&$bootstrap)
    {
        $this->bootstrap = $bootstrap;
        $this->configuration();
    }

    protected function configuration()
    {
        ($this->bootstrap->pathRoot === null)
        ? $this->makePathRoot()
        : $this->bootstrap->pathRoot;

        ($this->bootstrap->urlBase === null)
        ? $this->makeUrlBase()
        : $this->bootstrap->urlBase;

        ($this->bootstrap->urlComplate === null)
        ? $this->makeUrlComplate()
        : $this->bootstrap->urlComplate;

        return false;
    }

    protected function makeProtocol()
    {
        $this->bootstrap->protocol = strpos(
            strtolower($_SERVER['SERVER_PROTOCOL']),
            'https'
        ) === FALSE ? 'http' : 'https';

        return false;
    }

    protected function makeHttpRoot()
    {
        $this->bootstrap->httpRoot = $_SERVER['HTTP_HOST'];

        return false;
    }

    protected function makeHttFolder()
    {
        $this->bootstrap->httpFolder =
        dirname($_SERVER['PHP_SELF']) . '/';

        return false;
    }

    protected function makeUrlBase()
    {
        $this->makeProtocol();
        $this->makeHttpRoot();
        $this->makeHttFolder();

        $this->bootstrap->urlBase = $this->bootstrap->protocol
        . "://" . $this->bootstrap->httpRoot
        . $this->bootstrap->httpFolder;

        return false;
    }

    protected function makeUrlComplate()
    {
        $this->bootstrap->urlComplate   = $this->bootstrap->protocol
        . "://" . $this->bootstrap->httpRoot . $_SERVER['REQUEST_URI'];

        return false;
    }

    protected function makePathRoot()
    {
        $this->bootstrap->pathRoot = dirname(__FILE__)
        .'/../../../';

        return false;
    }
}
