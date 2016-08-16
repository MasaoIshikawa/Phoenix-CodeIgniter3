<?php
class Support extends CI_Controller {
	function __construct()
    {
		parent::__construct();
		if ($this->session->userdata('admin_id') == FALSE)
			redirect('admin/login');
			
		$this->header_data = array('system_message' => $this->session->flashdata('message'));

		$this->load->model('contacts_support_model');

		$this->load->library('form_validation');

		$this->data = array();
		$this->data['sel']='support';
		$this->data['display_menu']='yes';
		$this->data['header_sel']='user';
	}

	function index()
	{
		$this->data['contacts']=$this->contacts_support_model->getContactList();
		
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->data['body']='admin/support/list';

		$this->load->view('admin/structure',$this->data);
	}

    function view($contact_id)
	{
		$this->data['contact']=$this->contacts_support_model->getSupportById($contact_id);
		if(empty($this->data['contact']))
			redirect('admin/support');
		$this->contacts_support_model->setIsRead($contact_id);	
		if($this->data['contact']['reply_id']==0)
			$this->data['replys'] = $this->contacts_support_model->getContactusHistory($contact_id);
		else
			$this->data['replys'] = $this->contacts_support_model->getContactusHistory($this->data['contact']['reply_id']);
			
		$this->data['contact_id'] = $contact_id;
		
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['body']='admin/support/view_contact';
		$this->load->view('admin/structure',$this->data);
	}

	function reply($contact_id)
    {
		$this->data['contact']=$this->contacts_support_model->getSupportById($contact_id);
		
		if(empty($this->data['contact']))
		{
			redirect('admin/support');
		}
			
		if($this->data['contact']['reply_id']==0)
		{
			$this->data['replys'] = $this->contacts_support_model->getContactusHistory($contact_id);
		}
		else
		{
			$this->data['replys'] = $this->contacts_support_model->getContactusHistory($this->data['contact']['reply']);
		}
	
		
		$this->data['contact_id'] = $contact_id;	

		$this->data['body']='admin/support/reply_contact';

		$this->load->view('admin/structure',$this->data);

    }


	function history($contact_id){
		
		$this->data['contact']=$this->contacts_support_model->getSupportById($contact_id);
		if(empty($this->data['contact']))
			redirect('admin/support');
		$this->contacts_support_model->setIsRead($contact_id);	
		if($this->data['contact']['reply']==0)
			$this->data['replys'] = $this->contacts_support_model->getContactusHistory($contact_id);
		else
			$this->data['replys'] = $this->contacts_support_model->getContactusHistory($this->data['contact']['reply']);
		
		$this->data['contact_id'] = $contact_id;	
		
		$this->data['message'] = $this->session->flashdata('message');

		$this->data['body']='admin/support/history_contact';

		$this->load->view('admin/structure',$this->data);
	}
	

	function delete_history($contact_id)
	{

		$contact=$this->contacts_support_model->getSupportById($contact_id);

		$this->contacts_support_model->Delete_Contacts_request($contact_id);

		$this->session->set_flashdata('message', 'The contact has been deleted.');

		redirect('admin/support/view/'.$contact['reply_id']);
	}
	function send($contact_id)
	{
		if($this->contacts_support_model->reply($contact_id)){ 


			if(isset($_FILES['attachment']['name']))
			{
				if($_FILES['attachment']['error']==0)
				{
					$filename = $_FILES['attachment']['name'];

					$config['upload_path'] = FCPATH.'/data/contactus/';

					$config['allowed_types'] = '*';

					$this->load->library('upload', $config);

					$this->upload->do_upload('attachment');
				}
			}

			$this->data['contact']=$this->contacts_support_model->getSupportById($contact_id);

            $this->load->library('email');

			$this->email->from($this->config->item('default_email'),'Phoenix');

			$this->email->to($this->data['contact']['email']);

			$this->email->subject($this->input->post('subject'));

			if(isset($_FILES['attachment']['name']))

			{

				if($_FILES['attachment']['error']==0)

					$this->email->attach(FCPATH.'/data/contactus/'.$filename);

			}

			$this->email->message(nl2br($this->input->post('message')));

			if ($this->email->send()){
				
				
				$this->session->set_flashdata('message', 'Your reply was sent.');

            	redirect('admin/support');
				
			} else {
				$this->session->set_flashdata('message', 'Error while sending!');

           		redirect('admin/support/reply/'.$contact_id);
			}

           

      	}

		else

			$this->reply($contact_id);
	}

    //deletes a contact
	function delete($contact_id)
	{

		$this->contacts_support_model->Delete_Contacts_request($contact_id);

		$this->session->set_flashdata('message', 'The contact has been deleted.');

		redirect('admin/support');

	}

	function delete_pp($contact_id) 	   
	{
		$this->data['contact_id'] = $contact_id;
		$this->load->view('admin/support/remove',$this->data);

	}

}

/* End of file home.php */

/* Location: ./system/application/controllers/admin/home.php */
