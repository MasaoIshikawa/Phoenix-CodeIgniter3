<?php class Faqs extends CI_Controller{
	


	public function __construct(){

			parent::__construct();
				if (!$this->session->userdata('admin_id'))
			redirect('admin/login');
			$this->data['header_sel']='content';
			$this->data['sel']='faqs';
			$this->load->model('admin_users');
			$this->load->model('faqs_model');
	
	}



	public function index(){
		$this->data['catlist']=$this->faqs_model->getCatList();
		//$this->data['userdata']=$this->admin_users->get_user_by_id($this->session->userdata('admin_id'));
		$this->data['body']='admin/faqs/home';
		$this->load->view('admin/structure',$this->data);
	}
	public function faqlist(){
			$this->data['topics']=$this->faqs_model->getFaqsList();
		$this->data['body']='admin/faqs/topiclist';
		$this->load->view('admin/structure',$this->data);
	}



	public function add(){

		$this->data['body']='admin/faqs/add_topic';
		$this->data['catlist']=$this->faqs_model->getCatList();
		$this->load->view('admin/structure',$this->data);

	}
	public function edit($id){
		$this->data['topic']=$this->faqs_model->getTopic_By_Id($id);
		$this->data['catlist']=$this->faqs_model->getCatList();
		$this->data['body']='admin/faqs/edit_topic';
		$this->load->view('admin/structure',$this->data);

	}
	
	
	
	public function delete_question($id) {
		
		$this->db->where('faq_id',$id);
		$this->db->delete('faqs');
		
		
		$this->session->set_flashdata('message', 'Question has been deleted');
			redirect('admin/faqs/faqlist');
		
		
		}
	public function delete_cat($id) {
		$this->db->where('id',$id);
		$this->db->delete('faq_topics');
			$this->db->where('faq_id',$id);
		$this->db->delete('faqs');
		$this->session->set_flashdata('message', 'Topic has been deleted');
			redirect('admin/faqs');
		
		}
	
	function savetopic() {
		$this->faqs_model->savetopic();
		$this->session->set_flashdata('message', 'Topic has been Added');
			redirect('admin/faqs/faqlist');
		
		}
	
	function updatequestion($id) {
		$this->faqs_model->updatetopic($id);
		$this->session->set_flashdata('message', 'Topic has been Updated');
			redirect('admin/faqs/faqlist');
		
	}
	
	
	public function save_categoy() {
		
		$this->faqs_model->save_cat();
		
		$this->session->set_flashdata('message', 'Faq Topic has been added');
			redirect('admin/faqs');
		}
		
		public function update_categoy() {
		
		$this->faqs_model->update_cat();
		
		$this->session->set_flashdata('message', 'Topic has been updated');
			redirect('admin/faqs');
		}


}
