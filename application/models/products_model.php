<?php class Products_Model extends CI_Model
{

	function __construct()
    {
        parent::__construct();
    }



	function getadminProducts($limit,$offset) {
			
			$searchfield=$this->input->post('searchfld');
			$checksearch=$this->input->post('checksearch');
			if($searchfield!='') {
			$this->session->set_userdata('search',$searchfield);
			}
			if($checksearch!='') {
				
				$search =$searchfield;
				}
			else {
			$search =$this->session->userdata('search');
			}
			$this->db->select('*');
			$this->db->from('products_table');
        	$this->db->order_by('p_id','desc');
			$this->db->limit($limit,$offset);
			
			if($search != '') {
			$this->db->like('product_name',$search);
			$this->db->or_like('catalog', $search); 
				} 
		return $this->db->get()->result_array();
		
		}
		
		function getsearchProducts() {
			
			$searchfield=$this->input->post('searchfld');
			
			 $this->session->set_userdata('search',$searchfield);
			$search =$this->session->userdata('search');
			
			$this->db->select('*');
			$this->db->from('products_table');
        	$this->db->like('product_name',$search);
			$this->db->or_like('catalog', $search); 
			$this->db->order_by('p_id','desc');
			
			
		return $this->db->get()->result_array();
		
		}
		
			
		function getSearchResult($search) {
		$array=array();
			if($search!='') {
			$this->db->select('*');
			$this->db->from('products_table');
			$this->db->join('product_assigned_cat','products_table.p_id=product_assigned_cat.product_assigned_id');	
			//$this->db->join('product_assigned_cat','categories.cat_id=product_assigned_cat.cat_assigned_id');	
   
			$this->db->like('products_table.product_name',$search);
			$this->db->or_like('products_table.catalog', $search); 
			
			$this->db->order_by('products_table.p_id','desc');
			$result=$this->db->get()->result_array();
		
		$array['product']=$result;
		
		foreach($result as $row) {
			
			$this->db->select('slug');
			$this->db->from('categories');
			$this->db->join('product_assigned_cat','categories.cat_id=product_assigned_cat.cat_assigned_id');	
		$this->db->where('product_assigned_cat.product_assigned_id',$row['p_id']);
		$array['category'][$row['p_id']]=$this->db->get()->row_array();
			
			}
			}
			return $array;
		}
		
		
		function gettotalProducts() {
		
		$this->db->select('*');
		$this->db->from('products_table');
        	
		return $this->db->get()->result_array();
		
		}
		
		
	function getProductbyId($id)
	
	{	
		$this->db->select('*');
		$this->db->from('products_table');
     
		$this->db->where('p_id',$id);
			
		return $this->db->get()->row_array(); 
	}
	
	
	function getProductsBycatId($id) {
		
		$this->db->select('*');
		$this->db->from('products_table');
     	$this->db->join('product_assigned_cat','products_table.p_id=product_assigned_cat.product_assigned_id');	
		$this->db->where('product_assigned_cat.cat_assigned_id',$id);
		
			
		return $this->db->get()->result_array(); 
		
		}
		
		
	function getCatIdBySlug($slug) {
	
		$this->db->select('*');
		$this->db->from('categories');
    	$this->db->where('slug',$slug);
			
		return $this->db->get()->row_array(); 
	}
	
	function getSubIdBySlug($slug) {
				$this->db->select('*');
				$this->db->from('sub_categories');
        		$this->db->where('sub_slug',$slug);
			
		return $this->db->get()->row_array(); 
	}		
		
			function getProductIdBySlug($slug) {
				$this->db->select('*');
				$this->db->from('products_table');
        		$this->db->where('catalog',$slug);
			
		return $this->db->get()->row_array(); 
	}		
		
		
		
	function getProductsBySubId($id) {
		
		$this->db->select('*');
		$this->db->from('products_table');
     	$this->db->join('product_assigned_subcat','products_table.p_id=product_assigned_subcat.product_assigned_sub_id');	
		$this->db->where('product_assigned_subcat.subcat_assigned_id',$id);
		
	return $this->db->get()->result_array(); 
	//echo $this->db->last_query();	
		}
	function getP_species_By_P_Id($id) {
		
		$this->db->select('*');
		$this->db->from('species');
		$this->db->join('product_assigned_species','species.id=product_assigned_species.specie_assigned_id');
		$this->db->where('product_assigned_species.prodcut_assigned_spec_id',$id);
		return $this->db->get()->result_array(); 
		}
		
	function getP_topics_By_P_Id($id) {
		
		$this->db->select('*');
		$this->db->from('topics_products');
		$this->db->join('topics','topics.topic_id=topics_products.topic_product_id');
		$this->db->where('topics_products.selec_product_id',$id);
		return $this->db->get()->result_array(); 
		}
		
			
		function getP_cats_By_P_Id($id) {
		
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->join('product_assigned_cat','categories.cat_id=product_assigned_cat.cat_assigned_id');	
		$this->db->where('product_assigned_cat.product_assigned_id',$id);
		return $this->db->get()->result_array(); 
		}	
		function getP_subcats_By_P_Id($id) {
		
		$this->db->select('*');
		$this->db->from('sub_categories');
		$this->db->join('product_assigned_subcat','sub_categories.sub_cat_id = product_assigned_subcat.subcat_assigned_id');
		$this->db->where('product_assigned_subcat.product_assigned_sub_id',$id);
		return $this->db->get()->result_array(); 
		}	
	function getCatList()
	{	
		$this->db->select('*');
		$this->db->from('categories');
        	$this->db->order_by('status','desc');
			
		return $this->db->get()->result_array(); 
	}
	
		function getSpecies()
	{	
		$this->db->select('*');
		$this->db->from('species');
        	$this->db->order_by('id','desc');
			
		return $this->db->get()->result_array(); 
	}
	
	
	function getFamily()
	{	
		$this->db->select('*');
		$this->db->from('family');
        	$this->db->order_by('family_id','desc');
			
		return $this->db->get()->result_array(); 
	}
	
		
	function getSequence()
	{	
		$this->db->select('*');
		$this->db->from('sequence');
        	$this->db->order_by('seq_id','desc');
			
		return $this->db->get()->result_array(); 
	}
	
	
	
	
		function getCatById($id)
	{	
		$this->db->select('*');
		$this->db->from('categories');
        	$this->db->where('cat_id',$id);
			
		return $this->db->get()->row_array(); 
	}
	
	function getSubCatList()
	{	
		$this->db->select('*');
		$this->db->from('sub_categories');
        $this->db->join('categories','sub_categories.parent_cat_id=categories.cat_id');
		$this->db->order_by('sub_categories.sub_cat_id','desc');
			
		return $this->db->get()->result_array(); 
	}
	
	function getSub_byID($id)  {
		
		$this->db->select('*');
		$this->db->from('sub_categories');
        
		$this->db->where('sub_cat_id',$id);
			
		return $this->db->get()->row_array();
		
		
		}
	
		function getSubCatList_ByCatId($id)
	{	
		$this->db->select('*');
		$this->db->from('sub_categories');
        
		$this->db->where('parent_cat_id',$id);
			
		return $this->db->get()->result_array(); 
	}
		

	
	
	function save_product() {
		
		$this->db->set('catalog',$this->input->post('catalog'));
		$this->db->set('product_name',$this->input->post('product_name'));
		$this->db->set('alternative_name',$this->input->post('alternative_name'));
		$this->db->set('family',$this->input->post('family'));
		$this->db->set('sequence',$this->input->post('sequence'));
		$this->db->set('prefix',$this->input->post('prefix'));
		$this->db->set('standard_size',htmlspecialchars($this->input->post('standard_size'),ENT_QUOTES));
		$this->db->set('price',$this->input->post('price'));
		$this->db->set('molecular_weight',$this->input->post('molecular_weight'));
		$this->db->set('solubility',$this->input->post('solubility'));
		$this->db->set('appearance',$this->input->post('appearance'));
		$this->db->set('purity',mysql_real_escape_string($this->input->post('purity')));
		
		$this->db->set('cross_reactivity',$this->input->post('cross_reactivity'));
		$this->db->set('min_detect_concentration',$this->input->post('min_detect_concentration'));
		$this->db->set('standard_range',$this->input->post('standard_range'));
		$this->db->set('rec_sample',$this->input->post('rec_sample'));
		
		$this->db->set('dilution',$this->input->post('dilution'));
		$this->db->set('protocol',$this->input->post('protocol'));
		$this->db->set('sample_prepration',$this->input->post('sample_prepration'));
		$this->db->set('sample_extration',$this->input->post('sample_extration'));
		
		$this->db->set('rec_plasma_level',$this->input->post('rec_plasma_level'));
		$this->db->set('standard_curve',$this->input->post('standard_curve'));
		$this->db->set('disclaimer',$this->input->post('disclaimer'));
		$this->db->set('storage_conditions',$this->input->post('storage_conditions'));
		
		$this->db->set('host',$this->input->post('host'));
		$this->db->set('tracer',$this->input->post('tracer'));
		$this->db->set('msds',$this->input->post('msds'));
		
		
		$this->db->set('contents',$this->input->post('contents'));
		
		$this->db->set('reference',$this->input->post('reference'));
		
		$this->db->set('comment',$this->input->post('comment'));
		$this->db->set('radioactivity',$this->input->post('radioactivity'));
		
		
		$this->db->set('product_slug',str_replace(' ','-',$this->input->post('product_name')));
		
	 	$this->db->insert('products_table');
		
		$insertid= $this->db->insert_id();	
		
	
	$categories = $this->input->post('category');
if(!empty($categories)) {		
for($i=0;$i<sizeof($categories); $i++ ) {
	
		$data=array(

	'cat_assigned_id'=>$categories[$i],
	'product_assigned_id'=>$insertid,
	);	
		$this->db->set($data);
		$this->db->insert('product_assigned_cat');
	
	}
}
	
	
	$species = $this->input->post('species');
if(!empty($species)) {		
for($i=0;$i<sizeof($species); $i++ ) {
	
		$data=array(

	'specie_assigned_id'=>$species[$i],
	'prodcut_assigned_spec_id'=>$insertid,
	);	
		$this->db->set($data);
		$this->db->insert('product_assigned_species');
	
	}
}
	
	
	
	$sub_category = $this->input->post('sub_category');
if(!empty($sub_category)) {		
for($i=0;$i<sizeof($sub_category); $i++ ) {
	
		$data=array(

	'subcat_assigned_id'=>$sub_category[$i],
	'product_assigned_sub_id'=>$insertid,
	);	
		$this->db->set($data);
		$this->db->insert('product_assigned_subcat');
	
	}
}
	
	return true;
	
		
		}
		
	
	function update_product() {
		
				
		$this->db->set('catalog',$this->input->post('catalog'));
		$this->db->set('product_name',$this->input->post('product_name'));
		$this->db->set('alternative_name',$this->input->post('alternative_name'));
		$this->db->set('family',$this->input->post('family'));
		$this->db->set('sequence',$this->input->post('sequence'));
		$this->db->set('prefix',$this->input->post('prefix'));
		$this->db->set('standard_size',$this->input->post('standard_size'));
		$this->db->set('price',$this->input->post('price'));
		$this->db->set('molecular_weight',$this->input->post('molecular_weight'));
		$this->db->set('solubility',$this->input->post('solubility'));
		$this->db->set('appearance',$this->input->post('appearance'));
		$this->db->set('purity',$this->input->post('purity'));
		
		$this->db->set('cross_reactivity',$this->input->post('cross_reactivity'));
		$this->db->set('min_detect_concentration',$this->input->post('min_detect_concentration'));
		$this->db->set('standard_range',$this->input->post('standard_range'));
		$this->db->set('rec_sample',$this->input->post('rec_sample'));
		
		$this->db->set('dilution',$this->input->post('dilution'));
		$this->db->set('protocol',$this->input->post('protocol'));
		$this->db->set('sample_prepration',$this->input->post('sample_prepration'));
		$this->db->set('sample_extration',$this->input->post('sample_extration'));
		
		$this->db->set('rec_plasma_level',$this->input->post('rec_plasma_level'));
		$this->db->set('standard_curve',$this->input->post('standard_curve'));
		$this->db->set('disclaimer',$this->input->post('disclaimer'));
		$this->db->set('storage_conditions',$this->input->post('storage_conditions'));
		
		$this->db->set('host',$this->input->post('host'));
		
		$this->db->set('tracer',$this->input->post('tracer'));
		
		$this->db->set('msds',$this->input->post('msds'));
		
		
		$this->db->set('contents',$this->input->post('contents'));
		
		$this->db->set('reference',$this->input->post('reference'));
		
		$this->db->set('comment',$this->input->post('comment'));
		
		$this->db->set('radioactivity',$this->input->post('radioactivity'));
		
		$this->db->set('product_slug',str_replace(' ','-',$this->input->post('product_name')));
		
		
	 	$this->db->where('p_id',$this->input->post('p_id'));
		
		$this->db->update('products_table');
		
		$insertid= $this->input->post('p_id');	
		
	$this->db->where('product_assigned_id',$insertid);	
	$this->db->delete('product_assigned_cat');
	
	$categories = $this->input->post('category');
if(!empty($categories)) {		
for($i=0;$i<sizeof($categories); $i++ ) {
	
		$data=array(

	'cat_assigned_id'=>$categories[$i],
	'product_assigned_id'=>$insertid,
	);	
		$this->db->set($data);
		$this->db->insert('product_assigned_cat');
	
	}
}
	
	$this->db->where('prodcut_assigned_spec_id',$insertid);	
	$this->db->delete('product_assigned_species');
	
	$species = $this->input->post('species');
if(!empty($species)) {		
for($i=0;$i<sizeof($species); $i++ ) {
	
		$data=array(

	'specie_assigned_id'=>$species[$i],
	'prodcut_assigned_spec_id'=>$insertid,
	);	
		$this->db->set($data);
		$this->db->insert('product_assigned_species');
	
	}
}
	
	
	$this->db->where('product_assigned_sub_id',$insertid);	
	$this->db->delete('product_assigned_subcat');
	
	$sub_category = $this->input->post('sub_category');
if(!empty($sub_category)) {		
for($i=0;$i<sizeof($sub_category); $i++ ) {
	
		$data=array(

	'subcat_assigned_id'=>$sub_category[$i],
	'product_assigned_sub_id'=>$insertid,
	);	
		$this->db->set($data);
		$this->db->insert('product_assigned_subcat');
	
	}
		
		}
	
	}
	function save_cat() {
		$title=$this->input->post('title');
		
		$detail=$this->input->post('detail');
		
		$icon=$this->input->post('icon');
		
		
		
		$status=$this->input->post('status');
		
		$this->db->set('title',$title);
		
		$this->db->set('slug',str_replace(' ','-',$title));
		
		$this->db->set('description',$detail);
		
		$this->db->set('icon',$icon);
		
		$this->db->set('status',$status);
		
		return $this->db->insert('categories');
		
		}
	
	function save_spec() {
		$title=$this->input->post('title');
		
		$detail=$this->input->post('detail');
		
	
		
		$this->db->set('name',$title);
		
		
		$this->db->set('detail',$detail);
		
		
		return $this->db->insert('species');
		
		}
		
	function update_spec() {
		
		$spec_id=$this->input->post('spec_id');
		
		$title=$this->input->post('title');
		
		$detail=$this->input->post('detail');
		
	
		
		$this->db->set('name',$title);
		
		
		$this->db->set('detail',$detail);
		
		$this->db->where('id',$spec_id);
		
		return $this->db->update('species');
		
		}		
		
		
		function save_sequence() {
		
		$title=$this->input->post('title');
		
		
		$three_letters=$this->input->post('three_letters');
		
		
		$one_letter=$this->input->post('one_letter');
		
		
		
		$this->db->set('full_name',$title);
		
		$this->db->set('three_letters',$three_letters);
		
		$this->db->set('one_letter',$one_letter);
		
	
		return $this->db->insert('sequence');
		
		}
		
		function update_sequence() {
		
		$spec_id=$this->input->post('seq_id');
		
		$title=$this->input->post('title');
		$three_letters=$this->input->post('three_letters');
		
		
		$one_letter=$this->input->post('one_letter');
		
		
		
		$this->db->set('full_name',$title);
		
		$this->db->set('three_letters',$three_letters);
		
		$this->db->set('one_letter',$one_letter);
		
		
	
		
		$this->db->where('seq_id',$spec_id);
		
		return $this->db->update('sequence');
		
		}		
		
		
		
		
			function save_sub_cat() {
		
		$cat_id=$this->input->post('cat_id');
		
		$title=$this->input->post('title');
		
		$detail=$this->input->post('detail');
		
		$icon=$this->input->post('icon');
		
		$status=$this->input->post('status');
		
		$this->db->set('sub_title',$title);
		$this->db->set('sub_slug',str_replace(' ','-',$title));
		$this->db->set('sub_description',$detail);
		$this->db->set('parent_cat_id',$cat_id);
		$this->db->set('icon_sub',$icon);
		$this->db->set('status_sub',$status);
		
		return $this->db->insert('sub_categories');
		
		}
		
		
		function update_cat() {
		
		$title=$this->input->post('title');
		
		$cat_id=$this->input->post('cat_id');
		
		$detail=$this->input->post('detail');
		
		$icon=$this->input->post('icon');
		
		
		$status=$this->input->post('status');
		
		$this->db->set('title',$title);
		
		$this->db->set('slug',str_replace(' ','-',$title));
		
		$this->db->set('description',$detail);
		
		$this->db->set('icon',$icon);
		
		$this->db->set('status',$status);
		
		
		$this->db->where('cat_id',$cat_id);
		
		return $this->db->update('categories');
		
		}
		function update_cat_sub() {
		
		$title=$this->input->post('title');
		
		$sub_cat_id=$this->input->post('sub_cat_id');
		
		$cat_id=$this->input->post('cat_id');
		
		$detail=$this->input->post('detail');
		
		$icon=$this->input->post('icon');
		
		$status=$this->input->post('status');
		
		$this->db->set('sub_title',$title);
		
		
		$this->db->set('sub_slug',str_replace(' ','-',$title));
		
		$this->db->set('sub_description',$detail);
		
		$this->db->set('parent_cat_id',$cat_id);
		
		$this->db->set('icon_sub',$icon);
		
		$this->db->set('status_sub',$status);
		
		$this->db->where('sub_cat_id',$sub_cat_id);
		
		return $this->db->update('sub_categories');
		
		}
		 function getProduct($tagname){
        if($tagname=='') {
			return $this->db->get('products_table')->result_array();
			 }
		else {
        return $this->db->like('product_name',$tagname)->get('products_table')->result_array();
		}
    }


function getSequence_BY_three() {
	$letters=$this->input->post('letters');
	$space=str_replace(' ','',$letters);
	$array=explode('-',$space);
	$result=array();
	for($i=0; $i<sizeof($array); $i++) {
	//$this->db->where('three_letters',$array);
	//return $this->db->get('sequence')->result_array();
	 $this->db->select('one_letter'); 
    $this->db->from('sequence');   
    $this->db->where('three_letters', $array[$i]);
    $result[]=$this->db->get()->row();
	}

return $result;
}
	function getSequence_BY_one() {
	
	$letters=$this->input->post('letters');
	$array=str_split($letters);
	$result=array();
	for($i=0; $i<sizeof($array); $i++) {
	//$this->db->where('three_letters',$array);
	//return $this->db->get('sequence')->result_array();
	 $this->db->select('three_letters'); 
    $this->db->from('sequence');   
    $this->db->where('one_letter', $array[$i]);
    $result[]=$this->db->get()->row();
	}

return $result;
	
	}

function get_orders_by_user() {
	
	$user_id =$this->session->userdata('user_id');
	$this->db->where('user_id',$user_id);
	return $this->db->get('order')->result_array();
	}
	function get_orders_by_id($id) {
	
	$this->db->where('order_id',$id);
	return $this->db->get('order')->result_array();
	
	
	}
	function get_order_detail($id) {
	
	
	$this->db->where('selected_order_id',$id);
	return $this->db->get('order_detail')->result_array();
	
	
	}
	
	function get_orders() {
		
		$this->db->select('*');
		$this->db->from('order');
		$this->db->join('members','members.member_id=order.user_id');
		$this->db->order_by('order.order_id','desc');
		return $this->db->get()->result_array();
		}
		function get_order_by_id_admin($id) {
		
		$this->db->select('*');
		$this->db->from('order');
		$this->db->join('members','members.member_id=order.user_id');
		$this->db->where('order_id',$id);
		return $this->db->get()->row_array();
		}
		
		function search_order($search) {
			
			$array=array();
			if($search!='') {
			$this->db->select('*');
			$this->db->from('order');
			$this->db->join('members','members.member_id=order.user_id');
   
			$this->db->like('order.first_name',$search);
			$this->db->or_like('order.last_name', $search); 
			
			$this->db->or_like('order.transaction_id', $search); 
			$this->db->or_like('order.status', $search); 
			$this->db->or_like('order.address', $search);
			$this->db->or_like('order.city', $search); 
			$this->db->or_like('order.state', $search); 
			
			$this->db->order_by('order.order_id','desc');
		return $this->db->get()->result_array();
			}
			else {
				
				$this->db->select('*');
			$this->db->from('order');
			$this->db->join('members','members.member_id=order.user_id');
   
			$this->db->order_by('order.order_id','desc');
		return $this->db->get()->result_array();
				}
			}	
}
?>
