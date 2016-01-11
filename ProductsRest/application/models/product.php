<?php
class Product extends CI_Model {
    public function get_all_products(){
        $query = "SELECT id, name, description, price FROM products";
        return $this->db->query($query)->result_array();    
    }
    public function get_product($id){
        $query = "SELECT id, name, description, price FROM products WHERE id = ?";
        return $this->db->query($query, $id)->row_array();
    }
    public function add_product($name, $description, $price){
        $query = "INSERT INTO products(name, description, price, created_at,  updated_at) VALUES (?, ?, ?, NOW(), NOW())";
        $values = array($name, $description, $price);
        $this->db->query($query, $values);
    }
    public function delete($product){
        $query = "DELETE FROM products WHERE id = ?";
        $this->db->query($query, $product);
    }
    public function update($id, $name, $description, $price){
        $query = "UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?";
        $values = array($name, $description, $price, $id);
        $this->db->query($query, $values);
    }
}
?>