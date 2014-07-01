<?php
namespace Mix\Core\Router;

// router class is make for routing url with config from bootstrap

class Router
{
    protected $bootstrap = null;

    public function __construct(&$bootstrap)
    {
        $this->bootstrap = $bootstrap;
        $this->routing();
    }

    protected function routing()
    {
        if ($this->bootstrap->type = "apps") {
            foreach ($this->bootstrap->config as $key => $val)
            {
                foreach ($val as $key => $val)
                {
                    if ($this->matchUrl($val) !== false) {
                        return $this->matchUrl($val);
                        break;
                    }
                }
            }
            throw new \Exception(
                "ERROR 404 : ". $this->bootstrap->urlComplate
                . "Not Found"
            );
            return false;
        }

        if ($this->bootstrap->type = "modules") {
            foreach ($this->bootstrap->config as $key => $val)
            {
                return $this->matchUrl($val);
            }
            throw new \Exception(
                "ERROR 404 : ". $this->bootstrap->urlComplate . "Not Found"
            );
            return false;
        }
        throw new \Exception(
            "ERROR Config : Type Appilcation Not Found"
        );
        return false;
    }

    protected function matchUrl($val)
    {
        $this->bootstrap->className = $val["pathUrl"];
        $this->parseUrl();

        // WARNING:check method get parameter standart belum dibuat.
        if ($this->bootstrap->urlAction
        === $this->bootstrap->urlWithOutParams
        && !empty($this->bootstrap->urlArrayParams[0])
        && !empty(
            $this->bootstrap->urlArrayParams[
                $this->bootstrap->urlCountArrayParams-1
            ]
        )) {
            return $this->bootstrap->pathFolder = $val["pathFolder"];
        }

        if ($this->bootstrap->urlAction === $this->bootstrap->urlComplate) {
            return $this->bootstrap->pathFolder = $val["pathFolder"];
        }

        return false;
    }

    protected function parseUrl()
    {
        $this->bootstrap->urlAction     = $this->bootstrap->urlBase
        .$this->bootstrap->className;

        $urlLengthBase       = strlen($this->bootstrap->urlAction);
        $urlParams           = substr(
            $this->bootstrap->urlComplate,
            $urlLengthBase
        );
        $this->bootstrap->urlParams        = substr($urlParams, 1);
        $this->bootstrap->urlArrayParams   = explode(
            '/',
            $this->bootstrap->urlParams
        );
        $urlLengthParams        = strlen($urlParams);
        $this->bootstrap->urlWithOutParams = substr(
            $this->bootstrap->urlComplate,
            0,
            (int)-$urlLengthParams
        );
        $this->bootstrap->urlCountArrayParams = count(
            $this->bootstrap->urlArrayParams
        );

        if (empty($this->bootstrap->urlArrayParams[1])
        || $this->bootstrap->urlArrayParams[0] != 'params'
        || (($this->bootstrap->urlCountArrayParams-1) % 2) != 0) {
            $this->bootstrap->urlArrayParams = null;
        }

        return false;
    }
}
