<?php 

class Privacy extends CI_Controller{



	public function __construct(){

		parent::__construct();
		$this->load->model('topics_model');	
		
		$this->load->model('products_model');
	$this->data['catList']=$this->products_model->getCatList();
	$this->data['topiclist']=$this->topics_model->getCatList();
	}



	public function index(){
		$this->data['meta']=getMetaContent('privacy_meta','meta');
		$this->data['body']='home/privacy';
		$this->data['content']=getMetaContent('privacy_content','data');
		$this->load->view('home/structure',$this->data);

	}


}
