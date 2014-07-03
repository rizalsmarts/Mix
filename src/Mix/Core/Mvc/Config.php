<?php
namespace Mix\Core\Mvc;

// config class is make for Configuration if config not full set

class Config
{
    private $bootstrap = null;

    public function __construct(&$bootstrap)
    {
        $this->bootstrap = $bootstrap;

        $this->configuration();
    }

    private function configuration()
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

    private function makeProtocol()
    {
        $protocol = strpos(
            strtolower($_SERVER['SERVER_PROTOCOL']),
            'https'
        ) === FALSE ? 'http' : 'https';

        $this->bootstrap->setProtocol($protocol);

        return false;
    }

    private function makeHttpRoot()
    {
        $this->bootstrap->setHttpRoot($_SERVER['HTTP_HOST']);

        return false;
    }

    private function makeHttFolder()
    {
        $this->bootstrap->setHttpFolder(
            dirname($_SERVER['PHP_SELF'])
            . '/'
        );

        return false;
    }

    private function makeUrlBase()
    {
        $this->makeProtocol();
        $this->makeHttpRoot();
        $this->makeHttFolder();

        $this->bootstrap->urlBase = $this->bootstrap->getProtocol()
        . "://" . $this->bootstrap->getHttpRoot()
        . $this->bootstrap->getHttpFolder();

        return false;
    }

    private function makeUrlComplate()
    {
        $this->bootstrap->urlComplate = $this->bootstrap->getProtocol()
        . "://"
        . $this->bootstrap->getHttpRoot()
        . $_SERVER['REQUEST_URI'];

        return false;
    }

    private function makePathRoot()
    {
        $this->bootstrap->pathRoot = dirname(__FILE__) . '/../../../';

        return false;
    }
}
