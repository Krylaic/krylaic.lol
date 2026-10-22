<?php

namespace App\Models;

class BlogModel extends BaseModel {
    
    public function getAllBlogs() {
        $result = $this->db->query("SELECT * FROM blog ORDER BY id DESC");

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getBlogPost($id) {
        $stmt = $this->db->prepare("SELECT * FROM blog WHERE id = ? LIMIT 1");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

}