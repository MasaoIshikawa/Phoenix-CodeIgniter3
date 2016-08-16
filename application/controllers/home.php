<?php  class Home extends CI_Controller  {
		
		public function __construct(){
		session_start();
		
		parent::__construct();
		$this->load->library('user_agent');
   
		$this->load->library('session');
        $this->load->helper('cookie');
		$this->load->model('users');
		$this->load->model(array('outbound_email_model'));
		
		$this->load->model('topics_model');	
		
		$this->load->model('products_model');
	$this->data['catList']=$this->products_model->getCatList();
	$this->data['topiclist']=$this->topics_model->getCatList();
		//$this->data['consumer_key'] = "mevmTyobqjm0aW5xMPWq4A";
  		
		//$this->data['consumer_secret'] = "AGD5giiTG0QxppoBBvlsViCmPPwlDrCoAbghon9OaU";
	
	
		$email_config['protocol'] = 'mail';
        $email_config['wordwrap'] = FALSE;
        $email_config['mailtype'] = 'html';
        $email_config['charset'] = 'utf-8';
        $email_config['crlf'] = "\r\n";
        $email_config['newline'] = "\r\n";
        $this->load->library('email', $email_config);
        $this->email->set_newline("\r\n");	
	}



	public function index(){
		
		/*$this->data['consumer_key'] = "mevmTyobqjm0aW5xMPWq4A";
  		
		$this->data['consumer_secret'] = "AGD5giiTG0QxppoBBvlsViCmPPwlDrCoAbghon9OaU";
	
		$this->load->library('twitter_oauth', $this->data);
 
 $token = $this->twitter_oauth->get_request_token();

 $_SESSION['oauth_request_token'] = $token['oauth_token'];
 $_SESSION['oauth_request_token_secret'] =$token['oauth_token_secret'];
 
 $request_link = $this->twitter_oauth->get_authorize_URL($token);
 
$this->data['twitterlink'] = $request_link;
		*/
		$this->data['signup_confirmation']=getMetaContent('signup_confirmation','data');
		$this->data['meta']=getMetaContent('home_meta','meta');
		$this->data['home_content']=getMetaContent('home_top_content','data');
		
		$this->data['what_new_section']=getMetaContent('what_new_section','data');
		$this->data['what_new_section_image']=getMetaContent('what_new_section_image','data');
		
		$this->data['home_page_blog_1']=getMetaContent('home_page_blog_1','data');
		$this->data['home_page_blog_image_1']=getMetaContent('home_page_blog_image_1','data');
		
		$this->data['home_page_blog_2']=getMetaContent('home_page_blog_2','data');
		$this->data['home_page_blog_image_2']=getMetaContent('home_page_blog_image_2','data');
		
		$this->data['home_page_blog_3']=getMetaContent('home_page_blog_3','data');
		$this->data['home_page_blog_image_3']=getMetaContent('home_page_blog_image_3','data');
		
		$this->data['home_page_slide_1']=getMetaContent('home_page_slide_1','data');
		//$this->data['home_page_slide_text_1']=getMetaContent('home_page_slide_text_1','data');
		
		$this->data['home_page_slide_2']=getMetaContent('home_page_slide_2','data');
		//$this->data['home_page_slide_text_2']=getMetaContent('home_page_slide_text_2','data');
		
		$this->data['home_page_slide_3']=getMetaContent('home_page_slide_3','data');
		//$this->data['home_page_slide_text_3']=getMetaContent('home_page_slide_text_3','data');
		
		
		$this->data['body']='home/frontpage';

		$this->load->view('home/structure',$this->data);

	}
	

	
	
	function validate_email_address(){
                       $input=$this->input->get('fieldValue');
                       $field=$this->input->get('fieldId');
				
			
			$rs		=	$this->db->where('email',$input)->get('members')->row_array();	
			
			if(!empty($rs)){
            
			            echo json_encode(array($field,false)); }
            
			            else { echo json_encode(array($field,true)); }
		}
	
	
	function validate_email_address_password(){
                       $input=$this->input->post('forgot_email');
                       
			
			$rs		=	$this->db->where('email',$input)->get('members')->row_array();	
			
			if(!empty($rs)){
            
			            $returnArr['error']	=	true; }
            
			            else { 
						$returnArr['error']	=	false;
						 }
						 
						 echo json_encode($returnArr);
		}
		
		function signin(){
					
			$returnArr	=	array();		
			
                               
				$email		=	$_POST['signin_email'];			
				$pass		=	$_POST['signin_password'];
				$sql	=	"select * from members where email = '$email' and password='".md5($pass)."'";
				$rs		=	$this->db->query($sql);		
				$Info	=	$rs->row_array();
                               
							    if(empty($Info)){
                                         $returnArr['error']	=	true;
					$returnArr['msg']	=	'Wrong email or password.';
                                }
				 else if($Info['ban'] == 1 ){
					$returnArr['error']	=	true;
					$returnArr['msg']	=	'you are banned';					
				}
				else if($Info['isactive'] != 1){
					$returnArr['error']	=	true;
					$returnArr['msg']	=	"You will be able to log in after you activate this account. Please, check your email inbox or <a href='".site_url('signin/resend_activation_email')."'>click here</a> to resend email.";
				}
				else{
					if($_POST['remember_me']==1){
						$cookie_name = "singin_email";
						$cookie_value = $_POST['signin_email'];
						setcookie('singin_email', $cookie_value, time() + 604800, "/"); 
						setcookie('singin_password',$pass,time() + 604800,"/");
                                                if ($_POST['remember_me']) $this->session->set_userdata('remember_me', TRUE);
					}
					else {
						setcookie('singin_email', '', time() - 3600);
						}

					$this->session->set_userdata($Info);
					$this->session->set_userdata('user_id',$Info['member_id']);
					$this->session->set_userdata('user_first_name',$Info['first_name']);
					$this->session->set_userdata('user_last_name',$Info['last_name']);
					$this->session->set_userdata('login_type', 'email');
				
				 if ($this->agent->is_referral())
    {
       $useragent=$this->agent->referrer();
    }
	if($useragent==base_url() || $useragent== base_url('home')) {
					$returnArr['error']	=	false;
	}
	else {
		
		$returnArr['error']	=	'refer';
		$returnArr['retrunurl']	=	$useragent;
		
		}
					$returnArr['msg']	=	'Logged in';
														
				}				
			
			echo json_encode($returnArr);
		}
		
		function validate_user_email_address($str){
			$sql	=	"select * from members where email = '$str'";
			$rs		=	$this->db->query($sql);		
			if($rs->num_rows()>0)
				return true;
			else{
				$this->form_validation->set_message('validate_user_email_address', "Email Address not exits in system");
				return false;				
			}

		}
		
		function validate_user($str){
			$email		=	$_POST['singin_email'];			
			$sql	=	"select * from members where email = '$email' and password='".md5($str)."'";
			$rs		=	$this->db->query($sql);		
			if($rs->num_rows()>0)
				return true;
			else{
				$this->form_validation->set_message('validate_user', "Invalid Email/Password.");
				return false;				
			}
		}
               
		
		
		
		//// sign in with linkdin //////////////////////
		
		
		function linkedin()
    {
		
	
    $config['base_url']             =   site_url() . 'home/linkedin';
    $config['callback_url']         =   site_url() . 'home/linkedin_submit';
    $config['linkedin_access']      =   '778ymm4v7tn5jc';
    $config['linkedin_secret']      =   'hcQbogcK1pnlT2M6';

    require_once APPPATH . "libraries/linkedin.php";

 

    # First step is to initialize with your consumer key and secret. We'll use an out-of-band oauth_callback
    $linkedin = new LinkedIn($config['linkedin_access'], $config['linkedin_secret'], $config['callback_url'] );
    
	$linkedin->debug = true;

    # Now we retrieve a request token. It will be set as $linkedin->request_token
    $linkedin->getRequestToken();
    
	//$_SESSION['requestToken'] = serialize($linkedin->request_token);
  
  $this->session->set_userdata('requestToken',serialize($linkedin->request_token));
  
    # With a request token in hand, we can generate an authorization URL, which we'll direct the user to
    //echo "Authorization URL: " . $linkedin->generateAuthorizeUrl() . "\n\n";
 $url=$linkedin->generateAuthorizeUrl();
  
  redirect($url);
   
   
    }

    /**
     * Get Access tokens
     */
    function linkedin_submit()
    {
		
		

    $config['base_url']             =   site_url() . 'home/linkedin';
    $config['callback_url']         =   site_url() . 'home/linkedin_submit';
    $config['linkedin_access']      =   '778ymm4v7tn5jc';
    $config['linkedin_secret']      =   'hcQbogcK1pnlT2M6';

    require_once APPPATH . "libraries/linkedin.php";
   
    
    # First step is to initialize with your consumer key and secret. We'll use an out-of-band oauth_callback
    $linkedin = new LinkedIn($config['linkedin_access'], $config['linkedin_secret'], $config['callback_url'] );
    //$linkedin->debug = true;

   if (isset($_REQUEST['oauth_verifier'])){
      //  $_SESSION['oauth_verifier']     = $_REQUEST['oauth_verifier'];
		$this->session->set_userdata('oauth_verifier',$_REQUEST['oauth_verifier']);
		
		
        $linkedin->request_token    =   unserialize($this->session->userdata('requestToken'));
       
	    $linkedin->oauth_verifier   =  $this->session->userdata('oauth_verifier') ;
		//$_SESSION['oauth_verifier'];
        $linkedin->getAccessToken($_REQUEST['oauth_verifier']);

        $this->session->set_userdata('oauth_access_token',serialize($linkedin->access_token));
		//$_SESSION['oauth_access_token'] = serialize($linkedin->access_token);
        
		header("Location: " . $config['callback_url']);
        exit;
   }
   else{
        $linkedin->request_token    =   unserialize($this->session->userdata('requestToken'));
        $linkedin->oauth_verifier   =   $this->session->userdata('oauth_verifier') ;
        $linkedin->access_token     =   unserialize($this->session->userdata('oauth_access_token'));
   }


    # You now have a $linkedin->access_token and can make calls on behalf of the current member
     $profile = $linkedin->getProfile("~:(id,first-name,last-name)");
    	 
	 //$social_id = $linkedin->getProfile("~:(id)");
	
	// $first_name = $linkedin->getProfile("~:(first-name)");
	
	// $last_name = $linkedin->getProfile("~:(last-name)");
	//$email = $linkedin->getProfile("~:(email-address)");

 $xml = @simplexml_load_string( $profile );

 	
	    foreach($xml as $key => $val)
    {
        
   $array[]=$val;
	 
  }
	   $social_id =rtrim($array[0]);
	
	   $first_name = rtrim($array[1]);
	
	   $last_name = rtrim($array[2]);
$result=$this->users->CheckPSocialUser($social_id);

if(sizeof($result)==0) {
	
	$this->users->SaveSocialUser($first_name, $last_name, $social_id, 'linkedin');
	
	$social_confirmation=getMetaContent('social_confirmation','data');
	
	$this->session->set_flashdata('social_confirm',$social_confirmation['data']);
					
	}
	
	$sql	=	"select * from members where social_id = '$social_id'";
				$rs		=	$this->db->query($sql);		
				$Info	=	$rs->row_array();
					$this->session->set_userdata($Info);
					$this->session->set_userdata('user_id',$Info['member_id']);
					$this->session->set_userdata('user_first_name',$Info['first_name']);
					$this->session->set_userdata('user_last_name',$Info['last_name']);
					$this->session->set_userdata('login_type', 'linkedin');
				
				
			
				redirect('myaccount/home');


	}
	
	
	// twitter
	
	
	function twitterlink() {
		
		require_once APPPATH . "libraries/twitter/twitteroauth.php";
		$twitteroauth = new TwitterOAuth('mevmTyobqjm0aW5xMPWq4A', 'AGD5giiTG0QxppoBBvlsViCmPPwlDrCoAbghon9OaU');
// Requesting authentication tokens, the parameter is the URL we will be redirected to
$request_token = $twitteroauth->getRequestToken(site_url('home/twitterlogin'));
 
// Saving them into the session
$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
 
// If everything goes well..
if($twitteroauth->http_code==200){
    // Let's generate the URL and redirect
    $url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
    header('Location: '. $url);
} else {
    // It's a bad idea to kill the script, but we've got to know when there's an error.
    die('Something wrong happened.');
}
		}
	
	function twitterlogin() {
		
		if(!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])){
    // We've got everything we need
} else {
    // Something's missing, go back to square 1
    redirect('home/twitterlink');
}
		require_once APPPATH . "libraries/twitter/twitteroauth.php";
		
		$twitteroauth = new TwitterOAuth('mevmTyobqjm0aW5xMPWq4A', 'AGD5giiTG0QxppoBBvlsViCmPPwlDrCoAbghon9OaU', $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
// Let's request the access token
$access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);
// Save it in a session var
$_SESSION['access_token'] = $access_token;
// Let's get the user's info
$user_info = $twitteroauth->get('account/verify_credentials');
// Print user's info
//print_r($user_info);
$social_id=$user_info->id;
$name=$user_info->name;
$namearr=explode(' ',$name);
$first_name=$namearr[0];
$last_name=$namearr[0];
		
		$result=$this->users->CheckPSocialUser($social_id);

if(sizeof($result)==0) {
	
	$this->users->SaveSocialUser($first_name, $last_name, $social_id, 'twitter');
	
	$social_confirmation=getMetaContent('social_confirmation','data');
	
	$this->session->set_flashdata('social_confirm',$social_confirmation['data']);
					
	}
	
	$sql	=	"select * from members where social_id = '$social_id'";
				$rs		=	$this->db->query($sql);		
				$Info	=	$rs->row_array();
					$this->session->set_userdata($Info);
					$this->session->set_userdata('user_id',$Info['member_id']);
					$this->session->set_userdata('user_first_name',$Info['first_name']);
					$this->session->set_userdata('user_last_name',$Info['last_name']);
					$this->session->set_userdata('login_type', 'twitter');
				
				
			
				redirect('myaccount/home');

		
		/*$this->data['oauth_token'] = $_SESSION['oauth_request_token'];
 		$this->data['oauth_token_secret'] = $_SESSION['oauth_request_token_secret'];

 		$this->load->library('twitter_oauth', $this->data);

 		$tokens = $this->twitter_oauth->get_access_token();

		 $_SESSION['oauth_access_token'] = $tokens['oauth_token'];
		 $_SESSION['oauth_access_token_secret'] =$tokens['oauth_token_secret'];
   
   $user_info = $this->twitter_oauth->get('account/verify_credentials');
// Print user's info
print_r($user_info);
    	print_r($tokens); 
		 echo $screen_name; */
	
		}
	
	function facebooklogin() {
		$fb_config = array(
      'appId'  => '378658968999345',
      'secret' => 'e1d161c3d7c499a373f6b5c6ddd727b1'
  );
  $this->load->library('facebook', $fb_config);
		
		$user = $this->facebook->getUser();

        if ($user) {
            
			try {
            
			    $useerprofile = $this->facebook->api('/me');
			
				$social_id=$useerprofile['id'];
			
				$name=$useerprofile['name'];
			
				$res_name = explode(' ',$name);
				
				$first_name=$res_name[0];
				
				$last_name=$res_name[1];
			
			$result=$this->users->CheckPSocialUser($social_id);

if(sizeof($result)==0) {
	
	$this->users->SaveSocialUser($first_name, $last_name, $social_id, 'facebook');
	
	$social_confirmation=getMetaContent('social_confirmation','data');
	
	$this->session->set_flashdata('social_confirm',$social_confirmation['data']);
					
	}
	
	$sql	=	"select * from members where social_id = '$social_id'";
				$rs		=	$this->db->query($sql);		
				$Info	=	$rs->row_array();
					$this->session->set_userdata($Info);
					$this->session->set_userdata('user_id',$Info['member_id']);
					$this->session->set_userdata('user_first_name',$Info['first_name']);
					$this->session->set_userdata('user_last_name',$Info['last_name']);
					$this->session->set_userdata('login_type', 'facebook');
				
				
			
				redirect('myaccount/home');

			} 
			
			catch (FacebookApiException $e) {
                $user = null;
            }
        }
		

    else {
		
            $login_url = $this->facebook->getLoginUrl();
		
      		redirect($login_url);
	}
		
		
		}
		
		
		// google confirmation  //   
		
		public function authticate_google() {
		
	require_once APPPATH . "libraries/google-api-php-client-master/src/Google/autoload.php";
    require_once APPPATH . "libraries/google-api-php-client-master/src/Google/Client.php";
    require_once APPPATH . "libraries/google-api-php-client-master/src/Google/Service/Oauth2.php";

// Store values in variables from project created in Google Developer Console
$client_id = '535649706500-fgmvo7h6u1pe81oa1q9t7gnmcb4tgc6o.apps.googleusercontent.com';
$client_secret = '6EWr5W7XHCnMhQVsR6evtHoh';
$redirect_uri = 'http://wsddev2.com/dev/phoenix/home/googlelogin';
$simple_api_key = 'AIzaSyAski4s_rU3inyxqP2Lib4FXjfcChhBTRA';

// Create Client Request to access Google API
$client = new Google_Client();
$client->setApplicationName("PHP Google OAuth Login Example");
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->setDeveloperKey($simple_api_key);
$client->addScope("https://www.googleapis.com/auth/userinfo.email");

// Send Client Request
		$objOAuthService = new Google_Service_Oauth2($client);
// Add Access Token to Session

		$authUrl = $client->createAuthUrl();

		redirect($authUrl);		
		}
	
public function googlelogin() {
	
	require_once APPPATH . "libraries/google-api-php-client-master/src/Google/autoload.php";
    require_once APPPATH . "libraries/google-api-php-client-master/src/Google/Client.php";
    require_once APPPATH . "libraries/google-api-php-client-master/src/Google/Service/Oauth2.php";

	
//Store values in variables from project created in Google Developer Console
$client_id = '535649706500-fgmvo7h6u1pe81oa1q9t7gnmcb4tgc6o.apps.googleusercontent.com';
$client_secret = '6EWr5W7XHCnMhQVsR6evtHoh';
$redirect_uri = 'http://wsddev2.com/dev/phoenix/home/googlelogin';
$simple_api_key = 'AIzaSyAski4s_rU3inyxqP2Lib4FXjfcChhBTRA';

// Create Client Request to access Google API
$client = new Google_Client();
$client->setApplicationName("PHP Google OAuth Login Example");
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->setDeveloperKey($simple_api_key);
$client->addScope("https://www.googleapis.com/auth/userinfo.email");

// Send Client Request
$objOAuthService = new Google_Service_Oauth2($client);
// Add Access Token to Session
if (isset($_GET['code'])) {

$client->authenticate($_GET['code']);

$_SESSION['access_token'] = $client->getAccessToken();

header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));

}

// Set Access Token to make Request
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
$client->setAccessToken($_SESSION['access_token']);
}

// Get User Data from Google and store them in $data
if ($client->getAccessToken()) {
$userData = $objOAuthService->userinfo->get();

$this->data['userData'] = $userData;
$_SESSION['access_token'] = $client->getAccessToken();

}


 $last_name = $userData->familyName;
 $first_name = $userData->givenName;
 $social_id = $userData->id;

$result=$this->users->CheckPSocialUser($social_id);

if(sizeof($result)==0) {
	
	$this->users->SaveSocialUser($first_name, $last_name, $social_id, 'google');

	$social_confirmation=getMetaContent('social_confirmation','data');
	
	$this->session->set_flashdata('social_confirm',$social_confirmation['data']);
			
	}
	
	$sql	=	"select * from members where social_id = '$social_id'";
				$rs		=	$this->db->query($sql);		
				$Info	=	$rs->row_array();
					$this->session->set_userdata($Info);
					$this->session->set_userdata('user_id',$Info['member_id']);
					$this->session->set_userdata('user_first_name',$Info['first_name']);
					$this->session->set_userdata('user_last_name',$Info['last_name']);
					$this->session->set_userdata('login_type', 'google');
				
				
			
				redirect('myaccount/home');

	

	}	

}
