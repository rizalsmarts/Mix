<?php
namespace Mix\Core\Mvc\Controller;

// check model yg dibutuhkan
// check view yg dibutuhkan

class Controller
{
     public function __construct(&$router)
     {
          echo'<pre>';
          var_dump($router->fileExists());
          echo'</pre>';
          echo "<br />Mix\Core\Mvc\Controller\Controller<br />";
     }
}
