<?php 



class Categories extends CI_Controller{
	


	public function __construct(){

			parent::__construct();

			if (!$this->session->userdata('admin_id'))
			redirect('admin/login');
			$this->data['header_sel']='products';
			$this->data['sel']='categories';
			$this->load->model('products_model');
	}



	public function index(){

		$this->data['catlist']=$this->products_model->getCatList();
		$this->data['body']='admin/categories/home';
		$this->load->view('admin/structure',$this->data);
	}
	
	public function subcats() {
		$this->data['catlist']=$this->products_model->getCatList();
		$this->data['subcatlist']=$this->products_model->getSubCatList();
		$this->data['body']='admin/categories/sub';
		$this->load->view('admin/structure',$this->data);
		
		}


	
	
	
	public function delete_cat($id) {
		$this->db->where('cat_id',$id);
		$this->db->delete('categories');
		$this->session->set_flashdata('message', 'Category has been deleted');
			redirect('admin/categories');
		
		}
		
			
	public function delete_cat_sub($id) {
		$this->db->where('sub_cat_id',$id);
		$this->db->delete('sub_categories');
		$this->session->set_flashdata('message', 'Category has been deleted');
			redirect('admin/categories/subcats');
		
		}
	
	
	
	public function save_categoy() {
		
		$this->products_model->save_cat();
		
		$this->session->set_flashdata('message', 'Category has been added');
			redirect('admin/categories');
		}
		
		public function save_sub_categoy() {
		
		$this->products_model->save_sub_cat();
		
		$this->session->set_flashdata('message', 'Sub category has been added');
			redirect('admin/categories/subcats');
		}
		
		public function update_categoy() {
		
		$this->products_model->update_cat();
		
		$this->session->set_flashdata('message', 'Category has been updated');
			redirect('admin/categories');
		}
		
		public function update_categoy_sub() {
		
		$this->products_model->update_cat_sub();
		
		$this->session->set_flashdata('message', 'Sub category has been updated');
			redirect('admin/categories/subcats');
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


}
