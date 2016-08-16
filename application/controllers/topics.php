<?php

class Topics extends CI_Controller{


	public function __construct(){

			parent::__construct();
		$this->load->model('topics_model');	
		$this->data['meta']=getMetaContent('topics_meta','meta');
		$this->load->model('products_model');
	$this->data['catList']=$this->products_model->getCatList();
	$this->data['topiclist']=$this->topics_model->getCatList();
	}


	public function index(){

		$this->data['catlist']=$this->topics_model->getCatList();
		$this->data['body']='home/topics/home';

		$this->load->view('home/structure',$this->data);
	}




	public function view($id){

		$this->data['topicsdata']=$this->topics_model->getTopicsList_front($id);
		$this->data['body']="home/topics/view";
		$this->load->view('home/structure',$this->data);
	}
}
