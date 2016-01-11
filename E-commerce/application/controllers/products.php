<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	
	
	public function index(){
		//Set up the cart session data as an associative array with product ids as keys and quantities ordered as values
		if(empty($this->session->userdata('cart'))){
			$this->session->set_userdata('cart', array());
		}
		//Set up the cart_count session variable		
		if(empty($this->session->userdata('cart_count'))){
			$this->session->set_userdata('cart_count', 0);
		}
		//Grab all products and load the main page
		$this->load->model('product');
		$products = $this->product->get_all();
		$this->load->view('listings', ['products' => $products]);
	}
	
	//add an item to cart
	public function add($id){
		//set the item id in the cart session and add the inputed quantity
		$cart = $this->session->userdata('cart');
		$cart[$id] += $this->input->get('quantity');
		$this->session->set_userdata('cart', $cart);
		
		//increase the cart count
		$count = $this->session->userdata('cart_count') + $this->input->get('quantity');
		$this->session->set_userdata('cart_count', $count);
		//go back to the main page
		redirect("/");
	}
	
	//go to checkout page
	public function view_cart(){
		//check if there is anything in the cart
		if($this->session->userdata('cart_count') > 0){
			//grab the product information from the db using the the item ids stored in cart session
			$this->load->model('product');
			$products = array();
			foreach($this->session->userdata('cart') as $key => $value){
				//check if the id key has a quantity greater than 0
				if ($value > 0){
					//push product info into a variable
					$products[] = $this->product->get_product($key);
				}
			}
			//load the checkout page and pass in the products in the cart
			$this->load->view('checkout', ['products' => $products]);
		}
		//if the cart is empty
		else {
			redirect ("/");
		}
	}
	
	
	//delete item from cart
	public function delete($id){
		$cart = $this->session->userdata('cart');
		$this->session->set_userdata('cart_count', $this->session->userdata('cart_count') - $cart[$id]);
		$cart[$id] = 0;
		$this->session->set_userdata('cart', $cart);
		redirect("/products/view_cart");
	}
	
	
	//destroy the session
	public function order(){
		$this->session->sess_destroy();
		redirect("/");
	}
}
?>