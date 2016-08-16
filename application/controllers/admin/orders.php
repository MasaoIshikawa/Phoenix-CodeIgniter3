<?php 



class Orders extends CI_Controller{
	


	public function __construct(){

			parent::__construct();
			
			if (!$this->session->userdata('admin_id'))
			redirect('admin/login');
			$this->data['header_sel']='orders';
			$this->data['sel']='orders';
	$this->load->model('products_model');
	}
	



	public function index(){

$this->data['orders']=$this->products_model->get_orders();
		$this->data['body']='admin/orders/home';
		$this->load->view('admin/structure',$this->data);
	}
	function view($id) {
		
		$this->data['orders']=$this->products_model->get_order_by_id_admin($id);
		$this->data['order_detail']=$this->products_model->get_order_detail($id);
		
		$this->data['body']='admin/orders/view';
		$this->load->view('admin/structure',$this->data);
		
		}
		
		function search() {
			$search=$this->input->post('searchorder');
			$this->data['orders']=$this->products_model->search_order($search);
			$this->data['body']='admin/orders/home';
		$this->load->view('admin/structure',$this->data);
			}
		function update($id) {
		
		$status=$this->input->post('status');
		$this->db->set('status',$status);
		$this->db->where('order_id',$id);
		$this->db->update('order');
		$this->session->set_flashdata('message', 'Order has been updated.');
		redirect('admin/orders');
		}
		
		function delete($id) {
		$this->db->where('order_id',$id);
		$this->db->delete('order');
		$this->db->where('selected_order_id',$id);
		$this->db->delete('order_detail');
		$this->session->set_flashdata('message', 'Order has been deleted.');
		redirect('admin/orders');
		
		}
}
