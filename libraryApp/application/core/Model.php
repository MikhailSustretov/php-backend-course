<?php

namespace application\core;

use application\db\Db;

abstract class Model
{

    public $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }
}