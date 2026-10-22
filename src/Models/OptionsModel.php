<?php

namespace App\Models;

class OptionsModel extends BaseModel {
    
    public function getSiteName() {
        $result = $this->db->query("SELECT name FROM options LIMIT 1");
        
        $row = $result->fetch_assoc();
        return $row['name'];
    }

    public function getDomain() {
        $result = $this->db->query("SELECT domain FROM options LIMIT 1");

        $row = $result->fetch_assoc();
        return $row['domain'];
    }

    public function getAbout() {
        $result = $this->db->query("SELECT about FROM options LIMIT 1");

        $row = $result->fetch_assoc();
        return $row['about'];
    }
}