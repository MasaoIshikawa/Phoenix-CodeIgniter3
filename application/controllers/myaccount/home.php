<?php 

class Home extends CI_Controller{



	public function __construct(){

		parent::__construct();
		$this->load->model('users');
		$this->data['sel']='profile';
		$this->load->model('topics_model');	
		
		$this->load->model('products_model');
	$this->data['catList']=$this->products_model->getCatList();
	$this->data['topiclist']=$this->topics_model->getCatList();
		
		if($this->session->userdata('user_id')=='') {
			
			redirect('home');
			}
	}



	public function index(){
 
		if($this->session->flashdata('account_confirm')){

			$this->data['edit_account_confirmation']=getMetaContent('account_edit_confirmation','data');
		}
		
		$userid=$this->session->userdata('user_id');
		
		$this->data['userdata']= $this->users->get_user_by_id($userid);
		$this->data['add_info']= $this->users->get_user_add_info($userid);
		
		$this->data['meta']=getMetaContent('myaccount_meta','meta');
		$this->data['body']='home/myaccount/home';

		$this->load->view('home/structure',$this->data);

	}




		public function edit($userid){

		$this->data['userdata']= $this->users->get_user_by_id($userid);
		$this->data['add_info']= $this->users->get_user_add_info($userid);
		$this->data['meta']=getMetaContent('myaccount_edit_meta','meta');
		$this->data['body']='home/myaccount/edit';

		$this->load->view('home/structure',$this->data);

		}


		public function save(){
			
			$this->users->saveinfo();

	
		$this->session->set_flashdata('account_confirm',true);
		
		redirect('myaccount/home');		


		}
function addprofile_img(){
            
			
			
          $config1['image_library'] = 'gd2';
          $config1['create_thumb'] = FALSE;
          $config1['maintain_ratio'] =FALSE;
          $config1['width']	= 215;
          $config1['height']	= 170;
		
		 	$config['upload_path'] = './uploads/profileimage/';
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
	 
	 		$data[0] = base_url().'/uploads/profileimage/'.$video['file_name'];
			$data[1] = $video['file_name'];
			
			 list($width,$height)=  getimagesize('uploads/profileimage/'. $video['file_name']);
                       if($width>$height){
                           $config1['width']	= 215;
                            $config1['height']	= 170;
  }
		       
			
                        
                        $config1['source_image'] = 'uploads/profileimage/'. $video['file_name'];
                        $this->load->library('image_lib', $config1); 
                        $this->image_lib->resize();
			echo json_encode($data);
		}
	}

}
