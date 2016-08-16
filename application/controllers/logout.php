<?php
class Logout extends CI_Controller 
{

	function __construct()
	{
		 parent::__construct();
$this->data = array();

		
		parent::__construct();
		
		$this->load->model('topics_model');	
		
		$this->load->model('products_model');
	$this->data['catList']=$this->products_model->getCatList();
	$this->data['topiclist']=$this->topics_model->getCatList();
	}

	function index()
	{ 
//		$array_items = array('user_id' => '', 'user_type' => '','user_last_name'=>'','e'=>'','email'=>'','login_type'=>'');
//		$this->session->unset_userdata($array_items);	
		
	
			
   		@session_destroy();   			
        $this->session->unset_userdata('memberlogged');
		$this->session->unset_userdata('user_id');
        $this->session->sess_destroy();
		redirect('home') ;            
	}
	
}

?>
