<?php 
class contacts_model extends CI_Model
{

	function __construct()
    {
        parent::__construct();
    }

	function getContactList($field='', $order_type)
	{	
		if($field!='')	
			$this->db->order_by($field, $order_type);

		return $this->db->where('admin_id',0)->from('contacts')->get()->result_array();
	}

	function getContactById($contact_id)
	{
		return $this->db->where('contact_id', $contact_id)->get('contacts')->row_array();
	}
	
	function getsurvyById($contact_id)
	{
		return $this->db->where('contact_id', $contact_id)->get('survy_form')->row_array();
	}
	
	function getCatalogById($contact_id)
	{
		return $this->db->where('contact_id', $contact_id)->get('catalog_request')->row_array();
	}

	function getContactusHistory($contact_id, $field='', $order_type)
	{
		if($field!='')	
			$this->db->order_by($field, $order_type);
		else
			$this->db->order_by('date','desc');
		return $this->db->where('reply',$contact_id)->get('contacts')->result_array();	
	}

	function delete($contact_id)
	{
		if(!empty($contact_id))
		{
			$this->db->where('contact_id', $contact_id);

			$this->db->delete('contacts');

			$this->session->set_flashdata('message', 'Contact has been deleted.');

			return true;
		} else {

			$this->session->set_flashdata('message', 'Contact does not deleted. Try again!');

			return false;	

		}	

	}

	function reply($contact_id)
	{
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');

		$this->form_validation->set_rules('message', 'Message', 'trim|required');

		if($this->form_validation->run() == FALSE)
		{	
			$this->session->set_flashdata('message', validation_errors());

			return false;
		} else {		
			$contacts = $this->getContactById($contact_id);

			$this->db->set('first_name',$contacts['first_name']);

			$this->db->set('last_name',$contacts['last_name']);

			$this->db->set('email',$contacts['email']);

			$this->db->set('date',date('Y-m-d H:i:s'));

			$this->db->set('subject',$this->input->post('subject'));
			
			//$this->db->set('type','contact');
			
			$this->db->set('admin_id',1);

			$this->db->set('message',nl2br($this->input->post('message')));
			if($contacts['reply']==0)
				$this->db->set('reply',$contact_id);
			else	
				$this->db->set('reply',$contacts['reply']);
			$this->db->insert('contacts');

            return true;

       }

	}

	function Delete_Contacts($contact_id)
	{

		$this->db->where('contact_id', $contact_id)->delete('contacts');

		return true;

	}

	function getContectByEmail($email)
	{
		return $this->db->where(array('email'=>$email,'reply'=>0))->get('contacts')->row_array();
	}


	function Save()
	{	

		$contact = $this->getContectByEmail($this->input->post('email'));
		 

		$this->db->set('first_name',$this->input->post('first_name'), TRUE);

		$this->db->set('last_name',$this->input->post('last_name'), TRUE);

		$this->db->set('email',$this->input->post('email'), TRUE);

		$this->db->set('subject',$this->input->post('subject'), TRUE);

		$this->db->set('message',$this->input->post('message'), TRUE);
		if($this->input->post('pin')!='')
			
			$this->db->set('pin',$this->input->post('pin'), TRUE);
			
			$this->db->set('type','contact');
			
		$this->db->set('date',date('Y-m-d H:i:s'));

		if(count($contact) > 0)
			$this->db->set('reply',$contact['contact_id']);

		$this->db->insert('contacts');

		return TRUE;

	}
	
	function save_survy() {
		
		$name = $this->input->post('name');
		
		$email = $this->input->post('email');
		
		$message = $this->input->post('message');
		
		$subject = 'Customer Satisfaction Survey';	
	
		 $customer_type = serialize($this->input->post('customer_type'));	
		
		$occupation = $this->input->post('occupation'); //radio
		
		 $products_categories = serialize($this->input->post('products_categories'));
		
		$order_placed = $this->input->post('order_placed'); // radio
		
		$contact_customer_service = $this->input->post('contact_customer_service'); //radio
		
		$desired_product = $this->input->post('desired_product');	 // radio
		
		$rate_search_engine = $this->input->post('rate_search_engine'); // radio
									
		 $information_required = serialize($this->input->post('information_required'));
		
											
		$use_more_information = $this->input->post('use_more_information'); // radio
		
		$website_quality = $this->input->post('website_quality'); // radio
		
		$this->db->set('first_name',$name, TRUE);

		$this->db->set('email',$email, TRUE);

		$this->db->set('subject',$subject, TRUE);

		$this->db->set('message',$message, TRUE);
		
		$this->db->set('type','survy');
			
		$this->db->set('date',date('Y-m-d H:i:s'));
		
		$this->db->insert('contacts');
		
		$insert_id=$this->db->insert_id();
		
		$this->db->set('customer_type',$customer_type, TRUE);

		$this->db->set('occupation',$occupation, TRUE);

		$this->db->set('products_categories',$products_categories, TRUE);

		$this->db->set('order_placed',$order_placed, TRUE);
		
		$this->db->set('contact_customer_service',$contact_customer_service, TRUE);

		$this->db->set('desired_product',$desired_product, TRUE);

		$this->db->set('rate_search_engine',$rate_search_engine, TRUE);

		$this->db->set('information_required',$information_required, TRUE);
		
		$this->db->set('use_more_information',$use_more_information, TRUE);

		$this->db->set('website_quality',$website_quality, TRUE);

		$this->db->set('contact_id',$insert_id, TRUE);
		
		$this->db->insert('survy_form');
		
		return true;
		
		}
	
	function save_catalog() {
		
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		
		$email = $this->input->post('email');
		
		
		$company_name = $this->input->post('company_name');
		
		 $street = $this->input->post('street');	
		
		$billing = $this->input->post('billing');
		
		$zip = $this->input->post('zip');
		
		$city = $this->input->post('city');
		
		$state = $this->input->post('state');
		
		$country = $this->input->post('country');
		
		 
		$this->db->set('first_name',$first_name, TRUE);
		
		$this->db->set('last_name',$last_name, TRUE);

		$this->db->set('email',$email, TRUE);

		$this->db->set('subject','Catalog Request Inquiry', TRUE);
		
		$this->db->set('type','catalog');
			
		$this->db->set('date',date('Y-m-d H:i:s'));
		
		$this->db->insert('contacts');
		
		$insert_id=$this->db->insert_id();
		
		$this->db->set('company_name',$company_name, TRUE);

		$this->db->set('street',$street, TRUE);

		$this->db->set('billing',$billing, TRUE);

		$this->db->set('city',$city, TRUE);
		
		$this->db->set('zip',$zip, TRUE);

		$this->db->set('state',$state, TRUE);

		$this->db->set('country',$country, TRUE);


		$this->db->set('contact_id',$insert_id, TRUE);
		
		$this->db->insert('catalog_request');
		
		return true;
		
		}
	
	
	function setIsRead($contact_id)
	{
		$this->db->set('isread',1)->where('contact_id', $contact_id)->update('contacts');
	}
}
?>
