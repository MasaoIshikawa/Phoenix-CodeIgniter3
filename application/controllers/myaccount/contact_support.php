<?php 
class Contact_support extends CI_Controller{



	public function __construct(){

		parent::__construct();
		$this->data['sel']='contact';
		
		$this->load->library('session');
        $this->load->helper('cookie');
		$this->load->model('users');
		$this->load->model('contacts_support_model');
		$this->load->model(array('outbound_email_model'));
		$this->load->model('topics_model');	
		
		$this->load->model('products_model');
	$this->data['catList']=$this->products_model->getCatList();
	$this->data['topiclist']=$this->topics_model->getCatList();
		//$this->data['consumer_key'] = "mevmTyobqjm0aW5xMPWq4A";
  		//$this->data['consumer_secret'] = "AGD5giiTG0QxppoBBvlsViCmPPwlDrCoAbghon9OaU";
	
	
		$email_config['protocol'] = 'mail';
        $email_config['wordwrap'] = FALSE;
        $email_config['mailtype'] = 'html';
        $email_config['charset'] = 'utf-8';
        $email_config['crlf'] = "\r\n";
        $email_config['newline'] = "\r\n";
        $this->load->library('email', $email_config);
        $this->email->set_newline("\r\n");	
		
		if($this->session->userdata('user_id')=='') { redirect('home'); }
		
	}



	public function index(){


		$this->data['meta']=getMetaContent('contact_support_meta','meta');
		$this->data['content']=getMetaContent('contact_support_content','data');
		$this->data['confirmation']=getMetaContent('contact_support_confirmation','data');
		$this->data['body']='home/myaccount/contact_support/home';

		$this->load->view('home/structure',$this->data);

	}






		public function save(){

		if($this->contacts_support_model->Save()){
				
				$this->notify_admins();
			   
			   $returnArr['error']	=	false;
				
			
			echo json_encode($returnArr);	
			}

		}
		
		public function requests() {
		$this->data['requests']= $this->contacts_support_model->getContectByUserId();	
		$this->data['meta']=getMetaContent('contact_support_meta','meta');
		$this->data['content']=getMetaContent('contact_support_content','data');
		$this->data['confirmation']=getMetaContent('contact_support_confirmation','data');	
		$this->data['body']='home/myaccount/contact_support/previous_requests';

		$this->load->view('home/structure',$this->data);

			}
			
			
		public function view_request_detail($id) {
		$this->data['requestdata']= $this->contacts_support_model->getContactById($id);	
		$this->data['meta']=getMetaContent('contact_support_meta','meta');
		$this->data['content']=getMetaContent('contact_support_content','data');
		$this->data['confirmation']=getMetaContent('contact_support_confirmation','data');	
		$this->data['body']='home/myaccount/contact_support/view_support_detail';

		$this->load->view('home/structure',$this->data);

			}
			
		public function delete_request($id) {
			$this->contacts_support_model->Delete_Contacts_request($id);
			redirect('myaccount/contact_support/requests');
			
			}	
			
		public function update() {
			
			if($this->contacts_support_model->Update()){
				//$this->notify_admins();
			$returnArr['error']	=	false;
				
			
			echo json_encode($returnArr);	
			}
			
			}		
		
		private function notify_admins(){

		$email=$this->outbound_email_model->get('contactus_admin_notification');
		$users=$this->db->get('admin_users')->result_array();
		$emails=array();
		foreach ($users as $value) {
			$emails[]=$value['email'];
		}
		$this->email->from($email['from'],$email['from_name']);
		$this->email->subject('Contact Support Inquiry');
		$this->email->message($email['content']);
		$this->email->to($emails);

		if($this->email->send()){

			return true;
		}

	}
}
