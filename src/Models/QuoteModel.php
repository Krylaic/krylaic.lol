<?php

namespace App\Models;

class QuoteModel extends BaseModel {
    
    public function getRandomQuote() {
        $result = $this->db->query("SELECT * FROM quotes ORDER BY RAND() LIMIT 1");
        
        return $result->fetch_assoc();
    }
}