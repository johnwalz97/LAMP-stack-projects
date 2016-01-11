<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {
    
    public function get_all(){
        $query = ("SELECT * FROM products");
        return $this->db->query($query)->result_array();
    }
    
    
    public function get_product($id){
        $query = ("SELECT * FROM products WHERE id = ?");
        return $this->db->query($query, $id)->row_array();
    }
}
?>