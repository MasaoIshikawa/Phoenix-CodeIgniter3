<?php 

class About extends CI_Controller{



	public function __construct(){

		parent::__construct();
	}



	public function index(){
		$this->load->model('topics_model');	
		
		$this->load->model('products_model');
	$this->data['catList']=$this->products_model->getCatList();
	$this->data['topiclist']=$this->topics_model->getCatList();

		$this->data['meta']=getMetaContent('about_meta','meta');
		$this->data['body']='home/about';
		$this->data['content']=getMetaContent('about_us_content','data');
		$this->load->view('home/structure',$this->data);

	}


}
