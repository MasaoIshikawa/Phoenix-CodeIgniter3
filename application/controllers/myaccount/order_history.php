<?php 
class Order_history extends CI_Controller{



	public function __construct(){

		parent::__construct();
		$this->data['sel']='order';
		$this->load->model('topics_model');	
		
		$this->load->model('products_model');
	$this->data['catList']=$this->products_model->getCatList();
	$this->data['topiclist']=$this->topics_model->getCatList();
	
	}



	public function index(){

		$this->data['meta']=getMetaContent('order_history_meta','meta');
		$this->data['body']='home/myaccount/order_history/home';
		$this->data['orders']=$this->products_model->get_orders_by_user();
		$this->load->view('home/structure',$this->data);

	}


		public function view($id){

		$this->data['meta']=getMetaContent('order_history_view_meta','meta');
		$this->data['body']='home/myaccount/order_history/view';
		$this->data['order']=$this->products_model->get_orders_by_id($id);
		$this->data['order_detail']=$this->products_model->get_order_detail($id);
		
		$this->load->view('home/structure',$this->data);

		}


		public function save(){

		$this->session->set_flashdata('account_confirm',true);
		
		
		redirect('myaccount');		


		}
}
