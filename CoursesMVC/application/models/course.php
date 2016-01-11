<?php
class Course extends CI_Model {
    public function get_all_courses(){
        $query = "SELECT id, name, description, created_at FROM courses";
        return $this->db->query($query)->result_array();    
    }
    public function add_course($name, $description){
        $query = "INSERT INTO courses(name, description, created_at) VALUES (?, ?, NOW())";
        $values = array($name, $description);
        $this->db->query($query, $values);
    }
    public function delete($course){
        $query = "DELETE FROM courses WHERE name = ?";
        $this->db->query($query, $course);
    }
}
?>