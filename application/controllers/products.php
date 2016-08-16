<?php

class Products extends CI_Controller{


	public function __construct(){

			parent::__construct();
			
		$this->data['meta']=getMetaContent('products_meta','meta');
	
	$this->load->model('topics_model');	
		
		$this->load->model('products_model');
	
	$this->data['catList']=$this->products_model->getCatList();
	$this->data['topiclist']=$this->topics_model->getCatList();
	
	}
	
	
	public function index(){

		$this->data['catList']=$this->products_model->getCatList();
		$this->data['body']='home/products/home';

		$this->load->view('home/structure',$this->data);
	}


	function category($slug) {
		
	$id=$this->products_model->getCatIdBySlug($slug);
	$this->data['catList']=$this->products_model->getCatList();	
	$this->data['catdata']=$this->products_model->getCatById($id['cat_id']);
	$this->data['products']=$this->products_model->getProductsBycatId($id['cat_id']);
	$this->data['subcatlist'] = $this->products_model->getSubCatList_ByCatId($id['cat_id']);	
	
		$this->data['body']="home/products/list";
		
		$this->load->view('home/structure',$this->data);
		
		}
		/*public function categorysearch($id) {
	
	$this->data['catList']=$this->products_model->getCatList();	
	$this->data['catdata']=$this->products_model->getCatById($id);
	$this->data['products']=$this->products_model->getProductsBycatId($id);
	$this->data['subcatlist'] = $this->products_model->getSubCatList_ByCatId($id);
	$this->data['body']="home/products/list";	
		$this->load->view('home/structure',$this->data);
			
			}*/
		
		
		public function searchresult() {
			
			$search=trim($this->input->post('searchproduct'));
			$this->data['serchdata']=$this->products_model->getSearchResult($search);
			 
			$this->data['body']="home/products/search";	
		$this->load->view('home/structure',$this->data);
		
			
			}
	public function subcategory($catslug, $slug) {
		
	$id = $this->products_model->getSubIdBySlug($slug);
		
	$this->data['catList']=$this->products_model->getCatList();

	
	$this->data['subcatdata'] = $this->products_model->getSub_byID($id['sub_cat_id']);			
	
	$this->data['products']=$this->products_model->getProductsBySubId($id['sub_cat_id']);
		
	$catdata=$this->products_model->getCatIdBySlug($catslug);
	
	$this->data['subcatlist'] = $this->products_model->getSubCatList_ByCatId($catdata['cat_id']);
		
		$this->data['catid']=$catslug;		
		
		$this->data['body']="home/products/list_sub_cat";
		
		$this->load->view('home/structure',$this->data);
		}
		
		public function subcategory_by_cat() {
		
	$id=$this->input->post('cat_id');	
	
echo json_encode($this->products_model->getSubCatList_ByCatId($id));			
			
	
		}
		
			
	public function view($catslug, $pslug){
		
		$catid=$this->products_model->getCatIdBySlug($catslug);
		$id=$this->products_model->getProductIdBySlug($pslug);
		$this->data['products']=$this->products_model->getProductsBycatId($catid['cat_id']);
		
		$this->data['productdetail']=$this->products_model->getProductbyId($id['p_id']);
		
		$this->data['species']=$this->products_model->getP_species_By_P_Id($id['p_id']);
		
		$this->data['topics']=$this->products_model->getP_topics_By_P_Id($id['p_id']);

		$this->data['body']='home/products/view';
		
		$this->data['catid']=$catslug;

		$this->load->view('home/structure',$this->data);

	}

	public function listProducts(){


		$this->data['body']="home/products/list";
		$this->load->view('home/structure',$this->data);
	}
	public function searchProducts() {
		$id=$this->products_model->getCatIdBySlug($slug);
	$this->data['catList']=$this->products_model->getCatList();	
	$this->data['catdata']=$this->products_model->getCatById($id['cat_id']);
	$this->data['products']=$this->products_model->getProductsBycatId($id['cat_id']);
	$this->data['subcatlist'] = $this->products_model->getSubCatList_ByCatId($id['cat_id']);	
	
		$this->data['body']="home/products/list";
		
		$this->load->view('home/structure',$this->data);
		}
		
		
}
