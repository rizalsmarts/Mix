<?php
namespace MixApp\default\controllers;

class IndexController // extends AbstractActionController
{
    public function __construct()
    {
    }

    public function indexAction ()
    {
        return "indexAction";
    }

    public function defaultAction ()
    {
        return "defaultAction";
    }
}
