<?php class Cart extends CI_Controller{


	public function __construct(){

			parent::__construct();
			
		$this->data['meta']=getMetaContent('cart_meta','meta');
		
		$this->load->library('cart');
		
		$this->load->model('topics_model');	
		
		$this->load->model('products_model');
	$this->data['catList']=$this->products_model->getCatList();
	$this->data['topiclist']=$this->topics_model->getCatList();
	
	if($this->session->userdata('user_id')=='') {
			
			//redirect('home');
			}
	}
 


	public function index(){
		
		$this->data['checkout_confirm']=getMetaContent('cart_checkout_confirm_content','data');
		
		$this->data['body']='home/cart/home';

		$this->load->view('home/structure',$this->data);
	}
		public function cart_template(){
		
		//$this->data['checkout_confirm']=getMetaContent('cart_checkout_confirm_content','data');
		
		$this->data['body']='home/cart/checkout_template';

		$this->load->view('home/cart/checkout_template',$this->data);
	}
	public function simple_cart(){
		
		//$this->data['checkout_confirm']=getMetaContent('cart_checkout_confirm_content','data');
		
		$this->data['body']='home/cart/cart_template';

		$this->load->view('home/structure',$this->data);
	}
	
	function addorder() {
		
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		 $price = $this->input->post('price');
		$qty = $this->input->post('qty');
		$catalog = $this->input->post('catalog');
		$size = $this->input->post('size');

				$bag = $this->cart->contents();
			
			if(!empty($bag)) {
				
				foreach ($bag as $item) {

				$productsarr[]= $item['id'];
				$rowidarr[]=$item['rowid'];
				$qtyarr[]=$item['qty'];
				}
		
        // check product id in session, if exist update the quantity
       if (false !== $key = array_search($id, $productsarr)) {
   
 
		    $data = array('rowid'=>$rowidarr[$key],
			'qty' => $qtyarr[$key]+1,
			
			);
            $this->cart->product_name_rules = '[:print:]';
			
			$this->cart->update($data);
		}
		
		
		else {

$data = array(
               'id'      => $id,
               'qty'     => $qty,
               'price'   => $price,
               'name'    => $name,
               'options' => array('size' => $size, 'catalog' => $catalog)
            );

$this->cart->product_name_rules = '[:print:]';

$this->cart->insert($data); 

}
		
			}
		
else {

$data = array(
               'id'      => $id,
               'qty'     => $qty,
               'price'   => $price,
               'name'    => $name,
               'options' => array('size' => $size, 'catalog' => $catalog)
            );
	
	$this->cart->product_name_rules = '[:print:]';
	
	$this->cart->insert($data); 

}


redirect('cart');
		
		
		}


function updatecart() {
	$qtyid=$this->input->post('rowid');
	$qty=$this->input->post('qty');
	$rowids=$this->input->post('remove');
	if(count($qtyid) > 0 ) {
		for( $i=0; $i < count($qtyid); $i++ ) {
	$data = array(
               'rowid' => $qtyid[$i],
               'qty'   => $qty[$i]
            );
$this->cart->product_name_rules = '[:print:]';
$this->cart->update($data); 

}
	}
if(count($rowids) > 0 ) {
		for( $j=0; $j < count($rowids); $j++ ) {
	$data = array(
               'rowid' => $rowids[$j],
               'qty'   => 0
            );
$this->cart->product_name_rules = '[:print:]';
$this->cart->update($data); 

		}
}

redirect('cart');
	
	
	}






}
