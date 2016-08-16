<?php 
class outbound_email_model extends CI_Model
{

	function __construct()
    {
        parent::__construct();
    }
	
	function getEmailList($fields='', $order_type)
	{
		if($fields!='')
			$this->db->order_by($fields, $order_type);
			
		return $this->db->from('emails')->get()->result_array();
	}
	
	function getEmailById($email_id)
	{
		if($email_id==0)
			$email = array_fill_keys($this->db->list_fields('emails'), '');
		else
			$email = $this->db->where('email_id', $email_id)->get('emails')->row_array();
			
		return $email;
	}
	
	function save_email($email_id)
	{
		//$this->form_validation->set_rules('from', 'From', 'trim|required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
		$this->form_validation->set_rules('content', 'Message', 'trim|required');
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('message', validation_errors());
			return false;
		}
		else
		{
			if ($email_id == 0)
			{
				$this->db->set('email_id', '');
				$this->db->insert('emails');
				$email_id = $this->db->insert_id();
			}
			
			//$this->db->set('from', $this->input->post('from'));
			$this->db->set('subject', $this->input->post('subject'));
			$this->db->set('content', $this->input->post('content'));
			
			$this->db->where('email_id', $email_id);
			$this->db->update('emails');
			
			$this->session->set_flashdata('message', 'Email saved.');
			return true;
		}	
	}
	
	function get($name,$fields=''){
		$email=$this->db->where('name',$name)->get('emails')->row_array();
		$dummy_text="Lorem ipsum dolores 
		Lorem ipsum dolores
		Lorem ipsum dolores
		Lorem ipsum dolores";
		$array['from']="noreply@example.com";
		$array['from_name']='Example Test';
		$array['subject']="Contact Example Subject:".$name;
		$array['name']=$name;
		$tags='';
		if(empty($email)){
			
			foreach ($fiealds as $value) {
				$tags.='{'.$valute."}";
			}
			$array['content']=$dummy_text.$tags;
			$array['legend']=$tags;
			$this->db->set($array);
			if($this->db->insert('emails')){

				$email=$this->db->where('name',$name)->get('emails')->row_array();
			}

		}
		return  $email;
	}	
}
?>
