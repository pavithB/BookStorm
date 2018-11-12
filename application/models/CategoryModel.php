<?php

class CategoryModel extends CI_Model {

    public function getAllCategory() {

        $this->db->select('*');
        $this->db->from('category');
        $query = $this->db->get();

        return $query;

    }
    
    public function insertNewCategory($categoryName, $categoryDescription, $bookCoverPath) {

        $data = array(
            'categoryName' => $categoryName,
            'categoryDescription' => $categoryDescription,
            'categoryCover' => $bookCoverPath);
            
        $query = $this->db->insert('category', $data);
    }


    public function getCategoryByID($categoryID) {

        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('categoryID', $categoryID);
        $query = $this->db->get();

        return $query->row();

    }
}
?>