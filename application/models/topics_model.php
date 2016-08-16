<?php class Topics_Model extends CI_Model
{

	function __construct()
    {
        parent::__construct();
    }

	function getCatList()
	{	
		$this->db->select('*');
		$this->db->from('topics_category');
        $this->db->join('admin_users','admin_users.user_id=topics_category.author_id');
		$this->db->order_by('topics_category.status_topic','desc');
			
		return $this->db->get()->result_array(); 
	}
	
	
	
		function getTopicsList()
	{	
		$this->db->select('*');
		$this->db->from('topics');
        $this->db->join('topics_category','topics.topic_cat_id=topics_category.cat_id');
		$this->db->order_by('topics.topic_id','desc');
			
		return  $this->db->get()->result_array(); 
	
	}
	
	function getTopicsList_front($id) {
		
		
		$this->db->select('*');
		$this->db->from('topics');
        $this->db->join('topics_category','topics.topic_cat_id=topics_category.cat_id');
		$this->db->where('topics.topic_cat_id',$id);
		
			
		$result= $this->db->get()->result_array(); 
	$array=array();
	$array['topics']=$result;
	foreach($result as $row) { 
	$array['topic_questions'][$row['topic_id']]=$this->db->where('question_topic_id',$row['topic_id'])->get('topic_questions')->result_array();
	
		$this->db->select('*');
		$this->db->from('topics_products');
	$this->db->join('products_table','products_table.p_id=topics_products.selec_product_id');
	$this->db->join('product_assigned_cat','products_table.p_id=product_assigned_cat.product_assigned_id');	
	$this->db->join('categories','categories.cat_id=product_assigned_cat.cat_assigned_id');
	$this->db->where('topics_products.topic_product_id',$row['topic_id']);
	$array['topic_products'][$row['topic_id']]= $this->db->get()->result_array();
	
	}
	return $array;
	}
	
	
			function getTopic_By_Id($id)
	{	
		$this->db->select('*');
		$this->db->from('topics');
        $this->db->join('topics_category','topics.topic_cat_id=topics_category.cat_id');
		$this->db->where('topics.topic_id',$id);
			
		$result= $this->db->get()->row_array(); 
	$array=array();
	$array['topic']=$result;
	$array['topic_questions']=$this->db->where('question_topic_id',$result['topic_id'])->get('topic_questions')->result_array();
	$array['topic_products']=$this->db->where('topic_product_id',$result['topic_id'])->get('topics_products')->result_array();
	return $array;
	}
	
	function gettopic_products($id) {
		$this->db->select('*');
		$this->db->from('topics_products');
		$this->db->join('products_table','products_table.p_id=topics_products.selec_product_id');
		$this->db->where('topics_products.topic_product_id',$id);
		return $this->db->get()->result_array();
		}
	
	
	function save_cat() {
		$title=$this->input->post('title');
		$detail=$this->input->post('detail');
		$status=$this->input->post('status');
		$icon=$this->input->post('icon');
		$author_id=$this->session->userdata('admin_id');
		$this->db->set('title',$title);
		$this->db->set('detail',$detail);
		$this->db->set('status_topic',$status);
		$this->db->set('icon',$icon);
		$this->db->set('author_id',$author_id);
		
		return $this->db->insert('topics_category');
		
		}
		
		function savetopic() {
			
			$title=$this->input->post('title');
		$topic_cat_id=$this->input->post('topic_cat');
		$summery=$this->input->post('summery');
		$description=$this->input->post('description');
		$image=$this->input->post('image');
		
		$this->db->set('topic_title',$title);
		$this->db->set('topic_cat_id',$topic_cat_id);
		$this->db->set('summery',$summery);
		$this->db->set('description',$description);
		$this->db->set('image',$image);
		
		 $this->db->insert('topics');
		$insert_id=$this->db->insert_id();
		
		$question=$this->input->post('question');
		$answer=$this->input->post('answer');
		if(count($question)>0) {
		for($i=0;$i<count($question);$i++) {
			
		$this->db->set('question_topic_id',$insert_id);
		$this->db->set('topic_cat_id',$topic_cat_id);
		$this->db->set('question',$question[$i]);
		$this->db->set('answer',$answer[$i]);
		$this->db->insert('topic_questions');
			
			}
		}
		
		$selected_products=$this->input->post('selected_products');
		if(count($selected_products)>0) {
		for($i=0;$i<count($selected_products);$i++) {
			
		$this->db->set('topic_product_id',$insert_id);
		$this->db->set('topic_product_cat_id',$topic_cat_id);
		$this->db->set('selec_product_id',$selected_products[$i]);
		$this->db->insert('topics_products');
			
			}
		}
			
		return true;
			
			
			}
			
		function updatetopic($id) {
			
			$title=$this->input->post('title');
		$topic_cat_id=$this->input->post('topic_cat');
		$summery=$this->input->post('summery');
		$description=$this->input->post('description');
		$image=$this->input->post('image');
		
		$this->db->set('topic_title',$title);
		$this->db->set('topic_cat_id',$topic_cat_id);
		$this->db->set('summery',$summery);
		$this->db->set('description',$description);
		$this->db->set('image',$image);
		
		 $this->db->where('topic_id',$id);
		 $this->db->update('topics');
		
		$this->db->where('question_topic_id',$id);
		$this->db->delete('topic_questions');
		
		$this->db->where('topic_product_id',$id);
		$this->db->delete('topics_products');
		
		$question=$this->input->post('question');
		$answer=$this->input->post('answer');
		if(count($question)>0) {
		for($i=0;$i<count($question);$i++) {
			
		$this->db->set('question_topic_id',$id);
		$this->db->set('topic_cat_id',$topic_cat_id);
		$this->db->set('question',$question[$i]);
		$this->db->set('answer',$answer[$i]);
		$this->db->insert('topic_questions');
			
			}
		}
		
		$selected_products=$this->input->post('selected_products');
		if(count($selected_products)>0) {
		for($i=0;$i<count($selected_products);$i++) {
			
		$this->db->set('topic_product_id',$id);
		$this->db->set('topic_product_cat_id',$topic_cat_id);
		$this->db->set('selec_product_id',$selected_products[$i]);
		$this->db->insert('topics_products');
			
			}
		}
			
		return true;
			
			
			}	
		function update_cat() {
		$title=$this->input->post('title');
		$detail=$this->input->post('detail');
		$status=$this->input->post('status');
		$icon=$this->input->post('icon');
		//$author_id=$this->input->post('userid');
		$cat_id=$this->input->post('cat_id');
		$this->db->set('title',$title);
		$this->db->set('detail',$detail);
		$this->db->set('status_topic',$status);
		$this->db->set('icon',$icon);
		//$this->db->set('author_id',$author_id);
		$this->db->where('cat_id',$cat_id);
		
		return $this->db->update('topics_category');
		
		}
		

	
}
?>
