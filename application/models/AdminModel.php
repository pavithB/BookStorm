<?php

class AdminModel extends CI_Model {

    public function adminData($username) {

        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username', $username);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
        return $query->result();
        } else {
        return false;
        }

    }
    

    public function authAdmin($data) {

        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
        return true;
        } else {
        return false;
        }
    }
   
}
?>