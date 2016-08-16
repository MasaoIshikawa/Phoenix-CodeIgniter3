<?php
class PublicUsers extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('admin_id')=='')
			redirect('admin/login');
			
		$this->load->library('form_validation');											//load form validation library		 
		$this->load->model('users');	
		$this->load->model('admin_users');													//load user model
		$this->data = array();
		$this->data['sel']='public_users';
		$this->data['display_menu']='yes';
		$this->data['header_sel']='user';
	}
	function index($fields='')
	{
		if($fields!='')
		{
			if($this->session->userdata('sorttype')=='')
				$this->session->set_userdata(array('sorttype'=>'asc'));
			else
			{ 
				if($this->session->userdata('sorttype')=='asc') {
					$this->session->unset_userdata(array('sorttype'=>''));
					$this->session->set_userdata(array('sorttype'=>'desc'));
				} else 	{
					$this->session->unset_userdata(array('sorttype'=>''));
					$this->session->set_userdata(array('sorttype'=>'asc'));
				}	
			}
		}
		$this->data['users'] =  $this->users->get_users($fields);
		$this->data['body']='admin/publicusers/home';
		$this->load->view('admin/structure',$this->data);
	}

	function delete_pp($user_id) 	   
	{
		$this->data['user_id'] = $user_id;
		$this->load->view('admin/publicusers/remove',$this->data);
	}
	function delete($id)
	{
		if(is_numeric($id))
		{
			$this->users->del_user($id);
			$this->session->set_flashdata('message', 'User has been deleted');
			redirect('admin/publicusers');
		}
	} 
	
	function ban($id)
	{
			
		if(is_numeric($id))
		{
			$user=$this->users->get_user_by_id($id);
			if($user['ban']==1){
				$this->unban($id);
			}
			$this->users->update_status($id, 1);
			$this->session->set_flashdata('message', 'User has been Banned');
			redirect('admin/publicusers/view/' . $id);
		}
	} 
	function unban($id)
	{
		if(is_numeric($id))
		{
			$this->users->update_status($id, 0);
			$this->session->set_flashdata('message', 'User has been Unbanned');
			redirect('admin/publicusers/view/' . $id);
		}
	} 
	function edit($user_id = 0)
	{	  	
		if ($user_id!=0)
		{			
			$this->data['user'] = $this->users->get_user_by_id($user_id);
			$this->data['edit']='edit';  
			$this->session->set_userdata('edit_publicuser_id',$user_id);
		}
	  	else
			$this->data['edit']='new';
			
		   $this->data['user_id']=$user_id;
		   $this->data['body']='admin/publicusers/edit';
		   $this->load->view('admin/structure',$this->data);	  

	}
	function view($user_id = '')
	{	  	
		$this->data['user'] = $this->users->get_user_by_id($user_id);
	   	$this->data['user_id']=$user_id;
	   	$this->data['body']='admin/publicusers/view';
	   	$this->load->view('admin/structure',$this->data);	  
	}
	
	function update_status($user_id)
	{
		$user = $this->users->get_user_by_id($user_id);
		$New_status = ($user['isactive'] == 1)?0:1;
		if($this->users->member_update_status($user_id, $New_status)){

			return true;
		}
	}
	
	function export_users($Type)
	{
		if ($Type == 'csv') {
			$this->users->export_csv();
		} else if ($Type == 'pdf') {
			$this->users->export_pdf();
		} else if ($Type == 'excel') {
			$this->users->export_excel();
		} else {
			$this->users->export_csv();
		}
	}
	
	function export()
	{	  	
		$this->data['users'] =  $this->users->get_users();
	   	$this->data['body']='admin/publicusers/export';
	   	$this->load->view('admin/structure',$this->data);	  
	}
	
	function exportcsv()
	{
		$this->users->export();
	}
	
	function save($user_id)
	{
		//Set Form validation rules
		if( $this->input->post('user_type') && $this->input->post('user_type') == 'member')
		{
	  	$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|callback_name_check');
		}
		else
		{
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|callback_name_check');
		}
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|xss_clean|required|alpha|callback_name_check');
	  	$this->form_validation->set_rules('email', 'Email Address', 'trim|xss_clean|required|valid_email|callback_username_check');
		if($user_id==0)
		{
			$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required');
			//$this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|xss_clean|required|callback_same');
		}	
		/*else
		{
			if($this->input->post('password',TRUE) != '' || $this->input->post('confirm',TRUE)!='') 
			{	
				$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required');
				$this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|xss_clean|required|callback_same');
			}
		}*/	
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
	  	if ($this->form_validation->run() != FALSE)
		{
			$first_name=$this->input->post('first_name',true);
			$last_name=$this->input->post('last_name',true);
			$email=$this->input->post('email',true);
			$password=$this->input->post('password',true);
	  		$active = '1';
			
			$this->users->SavePublicUser($first_name, $last_name, $email, $password, $user_id, $active);		//Calling model function for save admin user details
			if ($user_id==0)
			{			
				$this->data['edit']='new';
				$this->session->set_flashdata('message', 'Public user added successfully');
				redirect('admin/publicusers');
	  		}
			else 
				$this->session->set_flashdata('message', 'Public user updated successfully');
				redirect('admin/publicusers');
		}
		else
		{
			$this->edit($user_id);
		}
	}
	function same($confirm)
	{
		$pass=$this->input->post('password');
		if ($confirm!=$pass)
		{
			$this->form_validation->set_message('same', "The two passwords do not match");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	function name_check($name)
	{
		if ($name=='First Name' || $name=='Last Name')
		{
			$this->form_validation->set_message('name_check', "The ".$name." is required");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	function username_check($email) 
	{ 
		$result=$this->users->CheckPublicUser($email, $this->session->userdata('edit_publicuser_id'));
		if(count($result)>0)
		{
			$this->form_validation->set_message('username_check', 'This email address already exist in our database.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}
?>
