<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	
	public function index(){
		$this->load->model('product');
		$products = $this->product->get_all_products();
		//var_dump($products);
		$this->load->view('products', ['products' => $products]);
	}
	
	public function new_product(){
		$this->load->view('new_product');
	}
	
	public function create(){
		$this->load->model('product');
		$this->product->add_product($this->input->post('name'), $this->input->post('description'),  $this->input->post('price'));
		redirect("/");
	}
	
	public function destroy($id){
		$this->load->model('product');
		$this->product->delete($id);
		redirect("/");
	}
	
	public function show($id){
		$this->load->model('product');
		$product = $this->product->get_product($id);
		$this->load->view('show', $product);
	}
	
	public function edit($id){
		$this->load->model('product');
		$product = $this->product->get_product($id);
		$this->load->view('edit', $product);
	}
	
	public function update(){
		$this->load->model('product');
		$this->product->update($this->input->post("id"), $this->input->post("name"), $this->input->post("description"), $this->input->post("price"));
		redirect("/");
	}
}
