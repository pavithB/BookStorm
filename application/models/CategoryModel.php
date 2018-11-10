<?php

class CategoryModel extends CI_Model {

    public function getAllCategory() {

        $this->db->select('*');
        $this->db->from('category');
        $query = $this->db->get();

        return $query;

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