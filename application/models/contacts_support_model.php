<?php 
class contacts_support_model extends CI_Model
{

	function __construct()
    {
        parent::__construct();
    }

	function getContactList()
	{	
			$this->db->select('*');
			$this->db->from('contacts');
			$this->db->join('members','contacts.user_id=members.member_id');
			$this->db->order_by('contacts.date', 'desc');
			$this->db->where('contacts.reply',0);
		return $this->db->get()->result_array();
	}

	function getSupportById($contact_id)
	{
			$this->db->select('*');
			$this->db->from('contacts');
			$this->db->join('members','contacts.user_id=members.member_id');
			$this->db->where('contacts.contact_id',$contact_id);
		return $this->db->get()->row_array();
	}


	function getContactById($contact_id)
	{
		$result = $this->db->where('contact_id', $contact_id)->get('contacts')->row_array();
		$array=array();
		$array['request']=$result;
		
			$array['replies']=$this->db->where('reply',$result['contact_id'])->get('contacts')->result_array();
			
		
			return $array;
	}

	function getContactusHistory($contact_id)
	{
		
		$this->db->select('*');
			$this->db->from('contacts');
			$this->db->join('members','contacts.user_id=members.member_id');
			$this->db->where('contacts.reply',$contact_id);
			$this->db->order_by('contacts.date','desc');
			return $this->db->get()->result_array();
		
	}

	function delete($contact_id)
	{
		if(!empty($contact_id))
		{
			$this->db->where('contact_id', $contact_id);

			$this->db->delete('contacts');

			$this->session->set_flashdata('message', 'support has been deleted.');

			return true;
		} else {

			$this->session->set_flashdata('message', 'Contact does not deleted. Try again!');

			return false;	

		}	

	}

	function reply($contact_id)
	{
				
			$contacts = $this->getSupportById($contact_id);
			
			$this->db->set('request_name',$contacts['request_name'], TRUE);

		$this->db->set('order_number',$contacts['order_number'], TRUE);

		$this->db->set('priority',$contacts['priority'], TRUE);

		$this->db->set('user_id',$contacts['user_id'], TRUE);

		$this->db->set('message',nl2br($this->input->post('message')), TRUE);
		
		$this->db->set('date',date('Y-m-d H:i:s'));
		
		$this->db->set('type','support');
		
		$this->db->set('isread',0, TRUE);

			if($contacts['reply']==0)
				
				$this->db->set('reply',$contact_id);
			else	
				$this->db->set('reply',$contacts['reply']);
			
		
		$this->db->insert('contacts');

			
            return true;

       

	}

	function Delete_Contacts_request($contact_id)
	{

		$this->db->where('contact_id', $contact_id)->delete('contacts');

		return true;

	}

	function getContectByUserId()
	{
		return $this->db->where(array('user_id'=>$this->session->userdata('user_id'),'type'=>'support'))->get('contacts')->result_array();
	}


	function Save()
	{	

		//$contact = $this->getContectByEmail($this->input->post('email'));
		 
		$this->db->where('member_id',$this->session->userdata('user_id'));
		
		$userdata = $this->db->get('members')->row_array();
		
		$this->db->set('first_name',$userdata['first_name'], TRUE);
		
		$this->db->set('last_name',$userdata['last_name'], TRUE);
		
		$this->db->set('email',$userdata['email'], TRUE);
		
		$this->db->set('request_name',$this->input->post('request_name'), TRUE);

		$this->db->set('order_number',$this->input->post('order_number'), TRUE);

		$this->db->set('priority',$this->input->post('priority'), TRUE);

		$this->db->set('user_id',$this->session->userdata('user_id'), TRUE);
		
		$this->db->set('subject','Contact Support Inquiry', TRUE);
		
		$this->db->set('message',$this->input->post('message'), TRUE);
		
		$this->db->set('date',date('Y-m-d H:i:s'));
		
		$this->db->set('type','support');

		$this->db->set('isread',0, TRUE);

		$this->db->insert('contacts');

		return TRUE;

	}
	
	
	function Update()
	{	
		$this->db->where('member_id',$this->session->userdata('user_id'));
		
		$userdata = $this->db->get('members')->row_array();
		
		$this->db->set('first_name',$userdata['first_name'], TRUE);
		
		$this->db->set('last_name',$userdata['last_name'], TRUE);
		
		$this->db->set('email',$userdata['email'], TRUE);
		
		$this->db->set('reply',$this->input->post('reply_id'), TRUE); 

		$this->db->set('request_name',$this->input->post('request_name'), TRUE);

		$this->db->set('order_number',$this->input->post('order_number'), TRUE);

		$this->db->set('priority',$this->input->post('priority'), TRUE);

		$this->db->set('user_id',$this->session->userdata('user_id'), TRUE);
		
		$this->db->set('subject','Contact Support Inquiry');

		$this->db->set('message',$this->input->post('message'), TRUE);
		
		$this->db->set('date',date('Y-m-d H:i:s'));
		
		$this->db->set('type','support');

		$this->db->set('isread',0, TRUE);

		$this->db->insert('contacts');

		return TRUE;

	}
	
	
	function setIsRead($contact_id)
	{
		$this->db->set('isread',1)->where('contact_id', $contact_id)->update('contacts');
	}
}
?>
