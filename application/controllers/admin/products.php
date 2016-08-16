<?php class Products extends CI_Controller{
	
	public function __construct(){

			parent::__construct();
			$this->load->library('pagination');
			
			if (!$this->session->userdata('admin_id'))
			
			redirect('admin/login');
			
			$this->load->model('products_model');
		

			$this->data['header_sel']='products';
			$this->data['sel']='products';
	}
	

	public function index($offset=''){
		
		$this->load->library('pagination');
			
		  $config['base_url'] = site_url() . 'admin/products/index';
      
	    $products=$this->products_model->gettotalProducts();
		foreach($products as $row) {
			$test=$row['sequence'];
			 $query=str_replace(' ','',$test);
			$this->db->where('p_id',$row['p_id']);
			$this->db->set('sequence',$query);
			$this->db->update('products_table');
			}
		
		  $config['total_rows'] =count($this->products_model->gettotalProducts());
        
		
		  $config['per_page'] =100;
		 
		 $config['num_links'] = 5;
		
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		
		$this->pagination->initialize($config); 
			
		$this->data['productslist']=$this->products_model->getadminProducts( '100', $offset);
		
		$this->data['body']='admin/products/home';
		
		$this->load->view('admin/structure',$this->data);
	
	}
	
	
	public function addproducts(){

		$this->data['catlist']=$this->products_model->getCatList();
		$this->data['subcatlist']=$this->products_model->getSubCatList();
		$this->data['species']=$this->products_model->getSpecies();
		$this->data['family']=$this->products_model->getFamily();
		$this->data['body']='admin/products/add_products';
		$this->load->view('admin/structure',$this->data);
	}
	
	public function searchproducts(){

		$this->data['productslist']=$this->products_model->getsearchProducts();
		
		$this->data['body']='admin/products/home';
		
		$this->load->view('admin/structure',$this->data);
	}
	
	
	public function edit($id){

		$this->data['product_detail']=$this->products_model->getProductbyId($id);
		
		$this->data['product_species']=$this->products_model->getP_species_By_P_Id($id);
		
		$this->data['product_cats']=$this->products_model->getP_cats_By_P_Id($id);
		
		$this->data['product_subcats']=$this->products_model->getP_subcats_By_P_Id($id);
		
		$this->data['catlist']=$this->products_model->getCatList();
		
		$this->data['subcatlist']=$this->products_model->getSubCatList();
		
		$this->data['species']=$this->products_model->getSpecies();
		$this->data['family']=$this->products_model->getFamily();
		
		$this->data['body']='admin/products/edit_product';
		
		$this->load->view('admin/structure',$this->data);
	}
	public function view($id){

		$this->data['product_detail']=$this->products_model->getProductbyId($id);
		
		$this->data['product_species']=$this->products_model->getP_species_By_P_Id($id);
		
		$this->data['product_cats']=$this->products_model->getP_cats_By_P_Id($id);
		
		$this->data['product_subcats']=$this->products_model->getP_subcats_By_P_Id($id);
		
		
		
		$this->data['body']='admin/products/view_product';
		
		$this->load->view('admin/structure',$this->data);
	}
	
	public function save() {
		$this->products_model->save_product();
		
		$this->session->set_flashdata('message', 'Product has been added');
			redirect('admin/products');
		
		}
		
		
		public function update() {
		$this->products_model->update_product();
		
		$this->session->set_flashdata('message', 'Product has been updated');
			redirect('admin/products');
		
		}
		
		
		public function delete_prodcuts($id) {
			
			$this->db->where('p_id',$id);
			$this->db->delete('products_table');
			
		
			$this->db->where('product_assigned_id',$id);
			$this->db->delete('product_assigned_cat');
			
			$this->db->where('product_assigned_sub_id',$id);
			$this->db->delete('product_assigned_subcat');
			
		
			$this->session->set_flashdata('message', 'Product has been deleted');
			redirect('admin/products');
		
			
			}
			
		function addprofile_pdf(){
            
			
			
          $config1['image_library'] = 'gd2';
          $config1['create_thumb'] = FALSE;
          $config1['maintain_ratio'] =FALSE;
		 	$config['upload_path'] = './uploads/icons/';
			 $config['allowed_types'] = 'pdf';
  			$config['max_size']   = '402400';
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


		function addprofile_img(){
            
			
			
          $config1['image_library'] = 'gd2';
          $config1['create_thumb'] = FALSE;
          $config1['maintain_ratio'] =FALSE;
		 	$config['upload_path'] = './uploads/icons/';
			 $config['allowed_types'] = '*';
  			$config['max_size']   = '402400';
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



// species

public function save_speices() {
		
		$this->products_model->save_spec();
		
		$this->session->set_flashdata('message', 'Spiece has been added');
			redirect('admin/products/species');
		}
		
		
		
	public function update_spec() {
		
		$this->products_model->update_spec();
		
		$this->session->set_flashdata('message', 'Spiece has been updated');
			redirect('admin/products/species');
		}
		
		public function delete_spec($id) {
			
			$this->db->where('id',$id);
			$this->db->delete('species');
		
			$this->session->set_flashdata('message', 'Specie has been deleted');
			redirect('admin/products/species');
		
			
			}	


public function species() {		
$this->data['species']=$this->products_model->getSpecies();
		$this->data['body']='admin/products/species';
		$this->load->view('admin/structure',$this->data);		
}

public function save_family() {
		
		$this->products_model->save_family();
		
		$this->session->set_flashdata('message', 'Family has been added');
			redirect('admin/products/family');
		}
		
				
		
	public function update_family() {
		
		$this->products_model->update_family();
		
		$this->session->set_flashdata('message', 'Family has been updated');
			redirect('admin/products/family');
		}
		
		public function delete_family($id) {
			
			$this->db->where('family_id',$id);
			$this->db->delete('family');
		
			$this->session->set_flashdata('message', 'Family has been deleted');
			redirect('admin/products/family');
		
			
			}

public function family() {		
$this->data['species']=$this->products_model->getFamily();
		$this->data['body']='admin/products/family';
		$this->load->view('admin/structure',$this->data);		
}


public function save_sequence() {
		
		$this->products_model->save_sequence();
		
		$this->session->set_flashdata('message', 'Sequence has been added');
			redirect('admin/products/sequence');
		}
		
				
		
	public function update_sequence() {
		
		$this->products_model->update_sequence();
		
		$this->session->set_flashdata('message', 'Sequence has been updated');
			redirect('admin/products/sequence');
		}
		
		public function delete_sequence($id) {
			
			$this->db->where('seq_id',$id);
			$this->db->delete('sequence');
		
			$this->session->set_flashdata('message', 'Sequence has been deleted');
			redirect('admin/products/sequence');
		
			
			}

public function sequence() {		
$this->data['species']=$this->products_model->getSequence();
		$this->data['body']='admin/products/sequence';
		$this->load->view('admin/structure',$this->data);		
}
public function getSubcats() {
	
	$catid = $this->input->post('cat_id');
	echo json_encode($this->products_model->getSubCatList_ByCatId($catid));
			
}
		
}
