<?php class Faqs_Model extends CI_Model
{

	function __construct()
    {
        parent::__construct();
    }

	function getCatList()
	{	
		$this->db->select('*');
		$this->db->from('faq_topics');
        	$this->db->order_by('id','desc');
			
		return $this->db->get()->result_array(); 
	}
		function getFaqsList()
	{	
		$this->db->select('*');
		$this->db->from('faqs');
        $this->db->join('faq_topics','faq_topics.id=faqs.topic_id');
		$this->db->order_by('faqs.faq_id','desc');
			
		return  $this->db->get()->result_array(); 
	
	}
	
	function getTopicsList_front() {
		
		
		$this->db->select('*');
		$this->db->from('faq_topics');
        $this->db->order_by('id','desc');
			
		$result= $this->db->get()->result_array(); 
	$array=array();
	$array['topics']=$result;
	foreach($result as $row) { 
	$array['topic_questions'][$row['id']]=$this->db->where('topic_id',$row['id'])->get('faqs')->result_array();
	
	}
	return $array;
	}
	
	
			function getTopic_By_Id($id)
	{	
		$this->db->select('*');
		$this->db->from('faqs');
        $this->db->join('faq_topics','faq_topics.id=faqs.topic_id');
		$this->db->where('faqs.faq_id',$id);
			
		return $this->db->get()->row_array(); 
	
	}
	
	
	function save_cat() {
		$title=$this->input->post('title');
		
		$this->db->set('title',$title);
		
		return $this->db->insert('faq_topics');
		
		}
		
		function savetopic() {
			
		$topic_cat_id=$this->input->post('topic_cat');
		
		$question=$this->input->post('question');
		$answer=$this->input->post('answer');
		if(count($question)>0) {
		for($i=0;$i<count($question);$i++) {
		$this->db->set('topic_id',$topic_cat_id);	
		$this->db->set('question',$question[$i]);
		$this->db->set('answer',$answer[$i]);
		$this->db->insert('faqs');
			
			}
		}
		
			
		return true;
			
			
			}
			
		function updatetopic($id) {
			
		$question=$this->input->post('question');
		$answer=$this->input->post('answer');
		$topic_cat=$this->input->post('topic_cat');
		
		$this->db->set('topic_id',$topic_cat);	
		$this->db->set('question',$question);
		$this->db->set('answer',$answer);
		$this->db->where('faq_id',$id);
		$this->db->update('faqs');
		
	
		return true;
			
			
			}	
		function update_cat() {
		$title=$this->input->post('title');
		$cat_id=$this->input->post('id');
		$this->db->set('title',$title);
		
		$this->db->where('id',$cat_id);
		
		return $this->db->update('faq_topics');
		
		}
		

	
}
?>
