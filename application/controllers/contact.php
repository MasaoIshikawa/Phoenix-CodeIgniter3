<?php 

class Contact extends CI_Controller{



	public function __construct(){

		parent::__construct();

		$this->load->model('contacts_model');
		$this->load->model('outbound_email_model','email_outbound');
		$this->load->library('email');
		
		$this->load->model('topics_model');	
		
		$this->load->model('products_model');
	$this->data['catList']=$this->products_model->getCatList();
	$this->data['topiclist']=$this->topics_model->getCatList();
	}



	public function index(){

		$this->data['meta']=getMetaContent('contact_meta','meta');
		$this->data['body']='home/contact';

		$this->load->view('home/structure',$this->data);

	}


	public function send(){
		if($this->input->post()){

			if($this->contacts_model->Save()){
				$this->notify_admins();
			}
		}

		$this->data['meta']=getMetaContent('contact_meta','meta');


		$this->data['contactus_confirmation']=getMetaContent('contactus_confirmation','data');
		$this->data['body']='home/contact';

		$this->load->view('home/structure',$this->data);
	}

	private function notify_admins(){

		$email=$this->email_outbound->get('contactus_admin_notification');
		$users=$this->db->get('admin_users')->result_array();
		$emails=array();
		foreach ($users as $value) {
			$emails[]=$value['email'];
		}
		$this->email->from($email['from'],$email['from_name']);
		$this->email->subject($email['subject']);
		$this->email->message($email['content']);
		$this->email->to($emails);

		if($this->email->send()){

			return true;
		}

	}
	 public function order_add_feed() {

// ======================================================================================
// SET THE TEMPLATE VARIABLES and OTHERS
// *** MODIFY THIS SECTION ***
// ======================================================================================
// Finally, set your key to decrypt the XML that you receive from FoxyCart.
// This must match *exactly* what you entered at http://www.foxycart.com/admin
$key = 'testkey3421wertyq';
// Optional: If you'd like to keep a log on your server of the results of this snippet, uncomment the
// following line, and put in an appropriate path.
// This is primarily intended for debugging when doing a custom implementation.
//$myFile = "/path/to/foxycart_datafeed.log";
// setup paths on server to the shared files 
// get these from http://modx.com/extras/package/foxycartinventory
$rc4cryptPath = APPPATH."/libraries/class.rc4crypt.php";
$xmlParserPath = APPPATH."/libraries/class.xmlparser_php5.php";
// Edit the section below for processwire specific stuff


$post_data = $this->input->post('FoxyData');

if ($post_data) {
	// ===================================================================================================
	// DECRYPT YOUR DATA
	// (do not modify)
	// ===================================================================================================
	// Decrypt the data using your $key
	
	include $rc4cryptPath;
	// Then decrypt the XML
	$FoxyData_encrypted = urldecode($post_data);
	$FoxyData_decrypted = rc4crypt::decrypt($key,$FoxyData_encrypted);
	
	
	
	
	// ===================================================================================================
	// PARSE YOUR XML
	// (do not modify)
	// ===================================================================================================
	// We now have a big fat XML that we can do whatever we want with.
		include $xmlParserPath;
		//Set up the parser object
		//$xml = new XMLParser($FoxyData_decrypted);
		$xml = simplexml_load_string($FoxyData_decrypted, NULL, LIBXML_NOCDATA);
		//Work the magic...
		//$data=$xml->Parse();
	// ===================================================================================================
	// MODIFY THE INVENTORY TV VALUE
	// ===================================================================================================
	//echo $output .= print_r($xml);

	// The XML is now a nice array called $data. Let's have fun.
	// First, loop through the transactions
	
	if (is_object($xml)) {
		
		foreach($xml->transactions->transaction as $transaction) {
 
		//This variable will tell us whether this is a multi-ship store or not
		$is_multiship = 0;
 
		//Get FoxyCart Transaction Information
		//Simply setting lots of helpful data to PHP variables so you can access it easily
		//If you need to access more variables, you can see some sample XML here: http://wiki.foxycart.com/v/1.1/transaction_xml_datafeed
		$transaction_id = (string)$transaction->id;
		$transaction_date = (string)$transaction->transaction_date;
		$customer_ip = (string)$transaction->customer_ip;
		$customer_id = (string)$transaction->customer_id;
		$customer_first_name = (string)$transaction->customer_first_name;
		$customer_last_name = (string)$transaction->customer_last_name;
		$customer_company = (string)$transaction->customer_company;
		$customer_email = (string)$transaction->customer_email;
		$customer_password = (string)$transaction->customer_password;
		$customer_address1 = (string)$transaction->customer_address1;
		$customer_address2 = (string)$transaction->customer_address2;
		$customer_city = (string)$transaction->customer_city;
		$customer_state = (string)$transaction->customer_state;
		$customer_postal_code = (string)$transaction->customer_postal_code;
		$customer_country = (string)$transaction->customer_country;
		$customer_phone = (string)$transaction->customer_phone;
		$orderProduct = mysql_real_escape_string($transaction->product_total);
				$orderTax = mysql_real_escape_string($transaction->tax_total);
				$orderShipping = mysql_real_escape_string($transaction->shipping_total);
				$orderTotal = mysql_real_escape_string($transaction->order_total);
				$shipping_first_name = (string)$transaction->shipping_first_name ? (string)$transaction->shipping_first_name : $customer_first_name;
			$shipping_last_name = (string)$transaction->shipping_last_name ? (string)$transaction->shipping_last_name : $customer_last_name;
			$shipping_company = (string)$transaction->shipping_company ? (string)$transaction->shipping_company : $customer_company;
			$shipping_address1 = (string)$transaction->shipping_address1 ? (string)$transaction->shipping_address1 : $customer_address1;
			$shipping_address2 = (string)$transaction->shipping_address1 ? (string)$transaction->shipping_address2 : $customer_address2;
			$shipping_city = (string)$transaction->shipping_city ? (string)$transaction->shipping_city : $customer_city;
			$shipping_state = (string)$transaction->shipping_state ? (string)$transaction->shipping_state : $customer_state;
			$shipping_postal_code = (string)$transaction->shipping_postal_code ? (string)$transaction->shipping_postal_code : $customer_postal_code;
			$shipping_country = (string)$transaction->shipping_country ? (string)$transaction->shipping_country : $customer_country;
			$shipping_phone = (string)$transaction->shipping_phone ? (string)$transaction->shipping_phone : $customer_phone;
			$shipto_shipping_service_description = (string)$transaction->shipto_shipping_service_description;
 		$data=array(
		'transaction_id'=>$transaction_id,
		'transaction_date'=>$transaction_date,
		'first_name'=>$customer_first_name,
		'last_name'=>$customer_last_name,
		'address'=>$customer_address1.$customer_address2,
		'city'=>$customer_city,
		'state'=>$customer_state,
		'country'=>$customer_country,
		'postalcode'=>$customer_postal_code,
		'phone_number'=>$customer_phone,
		'product_total'=>$orderProduct,
		'tax_total'=>$orderTax,
		'shipping_total'=>$orderShipping,
		'order_total'=>$orderTotal,
		'shipping_first_name'=>$shipping_first_name,
		'shipping_last_name'=>$shipping_last_name,
		'shipping_address'=>$shipping_address1.$shipping_address2,
		'shipping_city'=>$shipping_city,
		'shipping_state'=>$shipping_state,
		'shipping_country'=>$shipping_country,
		'shipping_postalcode'=>$shipping_postal_code,
		'shipping_phone'=>$shipping_phone,
		'status'=>'Received',
		'user_id'=>$this->session->userdata('user_id'),
		'email_address'=>$customer_email
		);
 
 
 
 			$this->db->set($data);
			 $this->db->insert('order');
 			$order_id=$this->db->insert_id();
		
 
 
 
 
		//For Each Transaction Detail
		foreach($transaction->transaction_details->transaction_detail as $transaction_detail) {
			$product_name = (string)$transaction_detail->product_name;
			$product_code = (string)$transaction_detail->product_code;
			$product_quantity = (int)$transaction_detail->product_quantity;
			$product_price = (double)$transaction_detail->product_price;
			$product_weight = $transaction_detail->product_weight;
			//$product_shipto = (double)$transaction_detail->shipto;
			//$category_code = (string)$transaction_detail->category_code;
			//$product_delivery_type = (string)$transaction_detail->product_delivery_type;
			//$sub_token_url = (string)$transaction_detail->sub_token_url;
			//$subscription_frequency = (string)$transaction_detail->subscription_frequency;
			//$subscription_startdate = (string)$transaction_detail->subscription_startdate;
			//$subscription_nextdate = (string)$transaction_detail->subscription_nextdate;
			//$subscription_enddate = (string)$transaction_detail->subscription_enddate;
			 	$orderdetail=array(
				'selected_order_id'=>$order_id,
				'product_name'=>$product_name,
					'price'=>$product_price,
				'quantity'=>$product_quantity,
				'weight'=>$product_weight,
		//'weight'=>'Pending',
		);
				$this->db->set($orderdetail);
 				$this->db->insert('order_detail');
				$order_detail_id=$this->db->insert_id();
			//These are the options for the product
			$transaction_detail_options = array();
			foreach($transaction_detail->transaction_detail_options->transaction_detail_option as $transaction_detail_option) {
				$product_option_name = $transaction_detail_option->product_option_name;
				$product_option_value = (string)$transaction_detail_option->product_option_value;
				$price_mod = (double)$transaction_detail_option->price_mod;
				$weight_mod = (double)$transaction_detail_option->weight_mod;
 			$array_option[]=$product_option_value;

 
			}
  $this->db->set('catalog',$array_option[1]);
   $this->db->set('size',$array_option[2]);
   // $this->db->set('category',$array_option[3]);
 
 $this->db->where('detail_id',$order_detail_id);
 $this->db->update('order_detail');
 
 $this->db->set('user_id',$array_option[3]);

 $this->db->where('order_id',$order_id);
 $this->db->update('order');
			//If you have custom code to run for each product, put it here:
 
 
 
		}
 
		//If you have custom code to run for each order, put it here:
 
 
 
 
 
 
 
 
 
 
 
 
	}
 
	//All Done!
	die("foxy");
 
 
 
 
 
 
 
//-----------------------------------------------------
// NO POST CONTENT SENT
//-----------------------------------------------------
} else {
	die('No Content Received From Datafeed');
}
 
	}

 }
}
