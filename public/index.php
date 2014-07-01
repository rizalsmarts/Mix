<?php

/**
* Mix Core (https://github.com/rizalsmarts)
*
* @link https://github.com/rizalsmarts for the canonical source repository
* @copyright Copyright (c) 2014 Mix Technology Inc. (https://github.com/rizalsmarts)
* @license https://github.com/rizalsmarts
*/

define('ROOT_PATH', dirname(__FILE__));
define('PUBLIC_PATH', dirname(__FILE__).'/../public');

ini_set ('display_errors', 2);

$autoloader = require_once(ROOT_PATH . '/../vendor/autoload.php');

$xyz = array(
    'mix-app' => array(
        array(
            'title'      => 'Default Index Action',
            'module'     => 'default',
            'controller' => 'default',
            'action'     => 'index',
            'className'  => 'MixApp\default\default',
            'pathFolder' => 'mix-app/modules/default',
            'pathUrl'    => 'mix-app/default/default/index',
        ),
        array(
            'title'      => 'Default Default Action',
            'module'     => 'default',
            'controller' => 'default',
            'action'     => 'default',
            'className'  => 'MixApp\default\default',
            'pathFolder' => 'mix-app/modules/default',
            'pathUrl'    => 'mix-app/default/default/default',
        ),
        array(
            'title'      => 'Blog News Action',
            'module'     => 'blog',
            'controller' => 'news',
            'action'     => 'index',
            'className'  => 'MixApp\blog\news',
            'pathFolder' => 'mix-app/modules/blog',
            'pathUrl'    => 'mix-app/blog/news/index',
        ),
    ),
    'other-app' => array(
        array(
            'label'      => 'Default Index Action',
            'module'     => 'default',
            'controller' => 'default',
            'action'     => 'index',
            'className'  => 'OtherApp\default\default',
            'pathFolder' => 'other-app/modules/default',
            'pathUrl'    => 'other-app/default/default/index',
        ),
    )
);

$router = new \Mix\Core\Mvc\Bootstarp($xyz);
echo'<pre>';
//~ var_dump($router->className = "mix-app/default/default/cokdeh");
var_dump($router);
echo'</pre>';

exit;
