<?php

class BookModel extends CI_Model {

    public function getAllBooks() {

        $this->db->select('*');
        $this->db->from('books');
        $this->db->join('category', 'category.categoryID = books.categoryID');
        $query = $this->db->get();

        return $query;

    }

    public function getBooksByCategory($categoryID) {

        $this->db->select('*');
        $this->db->from('book');
        $this->db->where('book.categoryID', $categoryID);
        $this->db->join('category', 'category.categoryID = book.categoryID');
        $query = $this->db->get();

        return $query;

    }

    public function getBookByID($bookID) {

        $this->db->select('*');
        $this->db->from('book');
        $this->db->where('bookID', $bookID);
        $this->db->join('category', 'category.categoryID = book.categoryID');
        $query = $this->db->get();

        return $query->row();

    }
    
   
}
?>