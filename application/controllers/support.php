<?php

class Support extends CI_Controller{


	public function __construct(){

			parent::__construct();
			
		$this->data['meta']=getMetaContent('technical_support_meta','meta');

		$this->load->model('contacts_model');
		$this->load->model('faqs_model');
		$this->load->model('outbound_email_model','email_outbound');
		$this->load->library('email');
		
		$this->load->model('topics_model');	
		
		$this->load->model('products_model');
	$this->data['catList']=$this->products_model->getCatList();
	$this->data['topiclist']=$this->topics_model->getCatList();
	}


	public function index(){
		
		
		$this->data['body']='home/technical-support/home';

		$this->load->view('home/structure',$this->data);
	}





	public function view($id=''){
	
	
	if( $id == 'catalog' ) {	
		
		$this->load->helper('captcha');
		$vals = array(
        'img_path' => './captcha/',
        'img_url' => base_url().'captcha/',
        'font_path' => './fonts/Walkway rounded.ttf',
		'img_width' => '200',
    'img_height' => 60,
        );

		$img = create_captcha($vals);
		$x = $this->session->set_userdata('captcha', $img['word']); 

		$this->data['captcha'] = $img['image'];
		$this->data['worddata'] = $img['word'];
		
	}
	
	if( $id == 'faqs' ) {
		
		$this->data['topics']=$this->faqs_model->getCatList();
		
		$this->data['topicdata']=$this->faqs_model->getTopicsList_front();
		
		
		}	
		
		if( $id == 'sample_preparation' ) {
		
		$this->data['plasma']=getMetaContent('sample_preparation_plasma','data');
		
		$this->data['tissue']=getMetaContent('sample_preparation_tissue','data');
		
		$this->data['blood']=getMetaContent('sample_preparation_blood','data');
		
		$this->data['csf']=getMetaContent('sample_preparation_csf','data');
				
		}	
		$array=array('catalog','survey','sample_preparation','faqs');
		
		if(in_array($id,$array)){
		
		$this->data['meta']=getMetaContent($id.'_meta','meta');
		
		if($id!='sample_preparation' || $id!='faqs')
		$googlform=getMetaContent('google_survy_form','data');
		 $string= $googlform['data'];

	$this->data['embdcode']=$string;
		$this->data['content']=getMetaContent($id.'_content','data');
		$this->data['body']='home/technical-support/'.$id;
		$this->load->view('home/structure',$this->data);
		
		}
		else {
			
			redirect('');
		} 
	}


public function refresh_captcha() {	
		
		$this->load->helper('captcha');
	
	$vals = array(
        'img_path' => './captcha/',
        'img_url' => base_url().'captcha/',
        'font_path' => './fonts/Walkway rounded.ttf',
        'img_width' => '200',
    'img_height' => 60,
		);
		

$img = create_captcha($vals);
$x = $this->session->set_userdata('captcha', $img['word']); 

$returnArr['captcha']	= $img['image'];	
$returnArr['worddata']	= $img['word'];				
			
			
			echo json_encode($returnArr);

}
public function getiframe() {	
		
$googlform=getMetaContent('google_survy_form','data');
		
$returnArr['captcha']	= $googlform['data'];	
			
			
			echo json_encode($returnArr);

}
	public function savecatalog() {
		
		
		if($this->contacts_model->save_catalog()){
				$this->notify_admins_catalog();
			}
			
			
		$contact_support_confirmation=getMetaContent('contactus_confirmation','data');
		
		$this->session->set_flashdata('contact_support_confirmation', $contact_support_confirmation['data']);
		
		redirect('support/view/catalog');
		}
	
	public function save_survy_form() {
		
		
		if($this->contacts_model->save_survy()){
				$this->notify_admins();
			}
			
			
		$contact_support_confirmation=getMetaContent('contactus_confirmation','data');
		
		$this->session->set_flashdata('contact_support_confirmation', $contact_support_confirmation['data']);
		
		redirect('support/view/survey');
		}

	private function notify_admins(){

		$email=$this->email_outbound->get('contactus_survy_notification');
		$users=$this->db->get('admin_users')->result_array();
		$emails=array();
		foreach ($users as $value) {
			$emails[]=$value['email'];
		}
		$this->email->from($email['from'],$email['from_name']);
		$this->email->subject($email['subject']);
		$this->email->message($email['content']);
		$this->email->to($emails);

		if($this->email->send()){

			return true;
		}

	}
	


private function notify_admins_catalog(){

		$email=$this->email_outbound->get('contactus_catalog_notification');
		$users=$this->db->get('admin_users')->result_array();
		$emails=array();
		foreach ($users as $value) {
			$emails[]=$value['email'];
		}
		$this->email->from($email['from'],$email['from_name']);
		$this->email->subject($email['subject']);
		$this->email->message($email['content']);
		$this->email->to($emails);

		if($this->email->send()){

			return true;
		}

	}
	


}
