<?php 

class Terms extends CI_Controller{



	public function __construct(){

		parent::__construct();
		
	}



	public function index(){
		$this->load->model('topics_model');	
		
		$this->load->model('products_model');
	$this->data['catList']=$this->products_model->getCatList();
	$this->data['topiclist']=$this->topics_model->getCatList();
		
		$this->data['meta']=getMetaContent('terms_meta','meta');
		$this->data['body']='home/terms';

		$this->load->view('home/structure',$this->data);

	}


}
