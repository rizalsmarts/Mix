<?php
namespace Mix\Core\Router;

// router class is make for routing url with config from bootstrap

class Router
{
    private $bootstrap = null;

    public function __construct(&$bootstrap)
    {
        $this->bootstrap = $bootstrap;
        $this->routing();
    }

    private function routing()
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
                "ERROR 404 : "
                . $this->bootstrap->urlComplate
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
                "ERROR 404 : "
                . $this->bootstrap->urlComplate
                . "Not Found"
            );
            return false;
        }
        throw new \Exception(
            "ERROR Config : Type Appilcation Not Found"
        );
        return false;
    }

    private function matchUrl($val)
    {
        $this->bootstrap->setClassName($val["pathUrl"]);
        $this->parseUrl();

        // WARNING:check method get parameter standart belum dibuat.
        if ($this->bootstrap->getUrlAction()
        === $this->bootstrap->urlWithOutParams
        && !empty($this->bootstrap->getUrlArrayParams()[0])
        && $this->bootstrap->getUrlCountArrayParams()-1 > 0
        && !empty(
            $this->bootstrap->getUrlArrayParams()
            [$this->bootstrap->getUrlCountArrayParams()-1]
        )) {
            return $this->bootstrap->setPathFolder($val["pathFolder"]);
        }

        if ($this->bootstrap->getUrlAction()
        === $this->bootstrap->urlComplate) {
            return $this->bootstrap->setPathFolder($val["pathFolder"]);
        }

        return false;
    }

    private function parseUrl()
    {
        $this->bootstrap->setUrlAction($this->bootstrap->urlBase
        .$this->bootstrap->getClassName());

        $urlLengthBase       = strlen($this->bootstrap->getUrlAction());
        $urlParams           = substr(
            $this->bootstrap->urlComplate,
            $urlLengthBase
        );
        $this->bootstrap->setUrlParams(substr($urlParams, 1));
        $this->bootstrap->setUrlArrayParams(
            explode(
                '/',
                $this->bootstrap->getUrlParams()
            )
        );
        $urlLengthParams        = strlen($urlParams);
        $this->bootstrap->urlWithOutParams = substr(
            $this->bootstrap->urlComplate,
            0,
            (int)-$urlLengthParams
        );
        $this->bootstrap->setUrlCountArrayParams(
            count(
                $this->bootstrap->getUrlArrayParams()
            )
        );

        if (isset($this->bootstrap->getUrlArrayParams()[1])
        && empty($this->bootstrap->getUrlArrayParams()[1])
        || $this->bootstrap->getUrlArrayParams()[0] != 'params'
        || (($this->bootstrap->getUrlCountArrayParams()-1) % 2) != 0) {
            $this->bootstrap->setUrlArrayParams(null);
        }

        return false;
    }
}
