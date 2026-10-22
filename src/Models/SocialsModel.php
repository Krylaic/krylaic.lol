<?php

namespace App\Models;

class SocialsModel extends BaseModel {
    
    public function getSocials() {
        $result = $this->db->query("SELECT * FROM socials ORDER BY id ASC");

        return $result->fetch_all(MYSQLI_ASSOC);
    }


}