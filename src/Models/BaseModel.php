<?php

namespace App\Models;

class BaseModel {
    protected $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }
}