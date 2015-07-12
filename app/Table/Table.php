<?php

namespace App\Table;

use App\App;

class Table{

    protected $table;
    protected $db;

    public function __construct(\App\Database $db){
        $this->db = $db;
        if(is_null($this->$table)){
            $parts = explode('\\', get_class($this));
            $classname = end($parts);
            $this->table = strtolower(str_replace('Table', '', $classname));
        }
    }
}