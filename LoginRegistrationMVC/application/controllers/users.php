<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function index(){
		if (!empty($this->session->userdata('user'))){
			redirect("/users/welcome");
		}
		$this->load->view('login');
	}
	public function login(){
		$this->load->model('user');
		$password = md5($this->input->post('password'));
		$login = $this->user->login_user($this->input->post('email'), $password);
		if (!empty($login)){
			$this->session->set_userdata('user', $login);
			redirect("/users/welcome");
		}
		else {
			$this->session->set_flashdata('errors', 'The login information you provided is incorrect');
			redirect("/");
		}
	}
	public function register(){
		$this->form_validation->set_rules('first_name', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|alpha');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Password', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->load->view('login');
		}
		else{
			$this->load->model('user');
			$user = $this->user->register_user($this->input->post('email'), $this->input->post('first_name'), $this->input->post('last_name'), $this->input->post('password'));
			$this->session->set_userdata('user', $user);
			redirect("/users/welcome");			
		}
	}
	public function welcome(){
		$this->load->view('welcome');	
	}
	public function logoff(){
		$this->session->sess_destroy();
		redirect("/");
	}
}
