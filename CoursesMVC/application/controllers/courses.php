<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {
	
	public function index(){
		$this->load->model('course');
		$courses = $this->course->get_all_courses();
		$this->load->view('courses', ['courses' => $courses]);
	}
	
	public function add(){
		if(strlen($this->input->post('name')) >= 15){
			$this->load->model('course');
			$this->course->add_course($this->input->post('name'), $this->input->post('description'));
		}
		else{
			$this->session->set_flashdata("message", "The course name must be at least 15 characters!");
		}
		redirect("/");
	}
	
	public function destroy(){
		$this->load->view('destroy');
	}
	
	public function delete(){
		$this->load->model('course');
		$this->course->delete($this->input->post('course_name'));
		redirect("/");
	}
}
