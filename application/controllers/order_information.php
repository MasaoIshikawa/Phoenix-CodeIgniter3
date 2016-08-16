<?php 

class Order_information extends CI_Controller{



	public function __construct(){

		parent::__construct();
		$this->load->model('topics_model');	
		
		$this->load->model('products_model');
	$this->data['catList']=$this->products_model->getCatList();
	$this->data['topiclist']=$this->topics_model->getCatList();
	}



	public function index(){

		$this->data['meta']=getMetaContent('order_information_meta','meta');
		$this->data['body']='home/order_information';
		$this->data['order_information_shipping']=getMetaContent('order_information_shipping_content','data');
		$this->load->view('home/structure',$this->data);

	}


}
