<?php
namespace Mix\Core;

interface RegistryInterface
{
    public function set($keyService, $nameService);

    public function get($keyService);

    public function clear();
}
