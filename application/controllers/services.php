<?php
class Services extends CI_Controller{


	public function __construct(){

			parent::__construct();
			
		$this->data['meta']=getMetaContent('services_meta','meta');
		
		$this->load->model('topics_model');	
		
		$this->load->model('products_model');
	$this->data['catList']=$this->products_model->getCatList();
	$this->data['topiclist']=$this->topics_model->getCatList();
	}


	public function index(){
		$this->data['peptide_detail']=getMetaContent('Peptide_Level_Determation','data');
		$this->data['peptide_detail_image']=getMetaContent('Peptide_Level_Determation_image','data');
		
		$this->data['synth_detail']=getMetaContent('Custom_syntheis','data');
		$this->data['synth_detail_image']=getMetaContent('Custom_syntheis_image','data');
		
		$this->data['body']='home/services/home';

		$this->load->view('home/structure',$this->data);
	}




	public function view($id){
		if($id=='peptide') {
		$this->data['peptide_detail']=getMetaContent('Peptide_Level_Determation','data');
		$this->data['peptide_detail_image']=getMetaContent('Peptide_Level_Determation_image','data');
		$this->data['peptide_detail_datatable']=getMetaContent('Peptide_Level_Determation_datatable','data');
		}
		else {
		$this->data['peptide_detail']=getMetaContent('Custom_syntheis','data');
		$this->data['peptide_detail_image']=getMetaContent('Custom_syntheis_image','data');
		$this->data['peptide_detail_datatable']=getMetaContent('Peptide_Level_Determation_datatable','data');
		}

		$this->data['body']='home/services/view';

		$this->load->view('home/structure',$this->data);
	}

public function getoneletter() {
			
			
			$sequence	=	$this->products_model->getSequence_BY_three();
    
    	echo json_encode($sequence);
			}
public function getthreeletter() {
			
			
			$sequence	=	$this->products_model->getSequence_BY_one();
    
    	echo json_encode($sequence);
			}
}
?>
