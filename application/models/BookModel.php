<?php

class BookModel extends CI_Model {

    public function getAllBooks() {

        $this->db->select('*');
        $this->db->from('books');
        $this->db->join('category', 'category.categoryID = books.categoryID');
        $query = $this->db->get();

        return $query;

    }

    public function booksPerCategory($categoryID){
        
        $this->db->select('*');
        $this->db->from('book');
        $this->db->where('book.categoryID', $categoryID);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function fetchBooksByCategory($limit, $start, $categoryID){

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('book');
        $this->db->where('book.categoryID', $categoryID);
        $this->db->join('category', 'category.categoryID = book.categoryID');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
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

    public function insertNewBook($bookTitle, $bookDescription, $bookCoverPath, $bookPrice, $bookAuthor, $bookCategory, $bookRating) {

        $data = array(
            'bookTitle' => $bookTitle,
            'bookDescription' => $bookDescription,
            'bookPrice' => $bookPrice,
            'bookCover' => $bookCoverPath,
            'author'    => $bookAuthor,
            'categoryID' => $bookCategory,
            'rating' => $bookRating);
        $query = $this->db->insert('book', $data);
    }

    public function getSearchResult($searchKeyWord) {
        // $query = $this->db->query("SELECT * FROM book WHERE (bookTitle LIKE '%$searchKeyWord%') OR (author LIKE '%$searchKeyWord%') ");
        $query = $this->db->query("SELECT * FROM `book` WHERE  bookTitle like '%$searchKeyWord%' OR author LIKE '%$searchKeyWord%' ");

        // $this->db->select('*');
        // $this->db->from('book');
        // $this->db->like('bookTitle', $searchKeyWord, 'both');
        // $this->db->like('author', $searchKeyWord, 'both');
        // // $this->db->join('category', 'category.categoryID = book.categoryID');
        // $query = $this->db->get();


        // echo $query->num_rows();
        return $query->result();
    }

    public function fetchBooksBySearch($limit, $start, $searchKeyWord){

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('book');
        $this->db->where('book.categoryID', $categoryID);
        $this->db->join('category', 'category.categoryID = book.categoryID');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

   
}
?>