<?php class Topics extends CI_Controller{
	


	public function __construct(){

			parent::__construct();
				if (!$this->session->userdata('admin_id'))
			redirect('admin/login');
			$this->data['header_sel']='products';
			$this->data['sel']='topics';
			$this->load->model('admin_users');
			$this->load->model('topics_model');
			$this->load->model('products_model');
	
	}



	public function index(){
		$this->data['catlist']=$this->topics_model->getCatList();
		$this->data['userdata']=$this->admin_users->get_user_by_id($this->session->userdata('admin_id'));
		$this->data['body']='admin/topics/home';
		$this->load->view('admin/structure',$this->data);
	}
	
	public function topicslist(){
			$this->data['topics']=$this->topics_model->getTopicsList();
		$this->data['body']='admin/topics/topiclist';
		$this->load->view('admin/structure',$this->data);
	}
function getProducts() {
	
		$tagname=$this->input->post('tag_name');
        echo json_encode($this->products_model->getProduct($tagname));
	}


	public function add(){

		$this->data['body']='admin/topics/add_topic';
		$this->data['catlist']=$this->topics_model->getCatList();
		$this->load->view('admin/structure',$this->data);

	}
	public function edit($id){
		$this->data['topicdata']=$this->topics_model->getTopic_By_Id($id);
		$this->data['topicproducts']=$this->topics_model->gettopic_products($id);
		$this->data['catlist']=$this->topics_model->getCatList();
		$this->data['body']='admin/topics/edit_topic';
		$this->load->view('admin/structure',$this->data);

	}
	
		public function view($id){
		$this->data['topicdata']=$this->topics_model->getTopic_By_Id($id);
		$this->data['catlist']=$this->topics_model->getCatList();
		$this->data['body']='admin/topics/view_topic';
		$this->load->view('admin/structure',$this->data);

	}
	
	
	public function delete_topic($id) {
		$this->db->where('topic_id',$id);
		$this->db->delete('topics');
		
		$this->db->where('question_topic_id',$id);
		$this->db->delete('topic_questions');
		
		$this->db->where('topic_product_id',$id);
		$this->db->delete('topics_products');
		
		$this->session->set_flashdata('message', 'Topic has been deleted');
			redirect('admin/topics/topicslist');
		
		
		}
	public function delete_cat($id) {
		$this->db->where('cat_id',$id);
		$this->db->delete('topics_category');
		$this->session->set_flashdata('message', 'Category has been deleted');
			redirect('admin/topics');
		
		}
	
	function savetopic() {
		$this->topics_model->savetopic();
		$this->session->set_flashdata('message', 'Topic has been Added');
			redirect('admin/topics/topicslist');
		
		}
	
	function updatetopic($id) {
		$this->topics_model->updatetopic($id);
		$this->session->set_flashdata('message', 'Topic has been Updated');
			redirect('admin/topics/topicslist');
		
		}
	function addprofile_img(){
            
			
			
          $config1['image_library'] = 'gd2';
          $config1['create_thumb'] = FALSE;
          $config1['maintain_ratio'] =FALSE;
		 	$config['upload_path'] = './uploads/icons/';
			 $config['allowed_types'] = 'jpg|png|gif';
  			$config['max_size']   = '202400';
  			$this->load->library('upload',$config);
  if ( ! $this->upload->do_upload('file')){
     $error = array('error' => $this->upload->display_errors());
  
  $data[0]='error';
 
  echo json_encode($data);
  } 
  else {
  
     $video=$this->upload->data();
	 
	 		$data[0] = base_url().'/uploads/icons/'.$video['file_name'];
			$data[1] = $video['file_name'];

			echo json_encode($data);
		}
	}

	public function save_categoy() {
		
		$this->topics_model->save_cat();
		
		$this->session->set_flashdata('message', 'Category has been added');
			redirect('admin/topics');
		}
		
		public function update_categoy() {
		
		$this->topics_model->update_cat();
		
		$this->session->set_flashdata('message', 'Category has been updated');
			redirect('admin/topics');
		}


}
