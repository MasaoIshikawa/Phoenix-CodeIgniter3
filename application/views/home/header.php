<script>

function showHide(showId,hideId){
    if(showId!=''){
    $('.'+showId).show();
    }
    if(hideId!=''){
    $('.'+hideId).hide();
    }
    
    
}

function commingSoon(){
  showHide('comming-soon','');
}

$(document).ready(function() {
	
<?php if($this->session->flashdata('social_confirm')==TRUE) { ?>

$('#social-confirmation').show();

<?php } ?>

<?php if($this->session->flashdata('account-activation')){ ?>

showHide('account-activation','');

<?php } ?>
<?php if($this->session->flashdata('forgot-password-confirmation')){ ?>

showHide('forgot-password-confirmation','');

<?php } ?>


});
</script>

<nav class="navbar">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="<?php echo base_url(''); ?>"><img src="<?php echo base_url('images/home');?>/logo.gif" alt="Phoenix Pharmaceuticals" title="Phoenix Pharmaceuticals"></a>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="navbar-collapse">
<div class="global-search">
<form method="post" action="<?php echo base_url('products/searchresult') ?>">
<input name="searchproduct" id="searchrecipe" type="text" class="form-control" placeholder="Search">
</form>
</div>	<!-- global search -->


<div class="right-head">
<ul>
<?php if($this->session->userdata('user_id')==TRUE) { ?>
<li><a class="" href="https://phoenixpeptide.foxycart.com/cart?cart=view">Shopping Cart</a></li>

<?php } else { ?>
<li><a href="javascript:void(0);" onclick="$('#signin-pop').show();">Shopping Cart</a></li>
 <?php } ?>

<?php if($this->session->userdata('user_id')==TRUE) { ?>
<li><a href="<?php echo site_url('myaccount/home'); ?>">My Account</a></li>
<li><a href="<?php echo site_url('logout'); ?>">Logout</a></li>

<?php }  else {?>

<li><a href="#" onclick="$('.signup-confirmation').hide(); $('#signup-pop').hide(); $('#signin-pop').toggle();">Sign In</a>
<?php } ?>


<div class="inline-popup" id="forgot-password-confirm" style="display:none;">
<p class="text-center"><?php $forgot=getMetaContent('forgot_password_confirmation','data');  echo $forgot['data']; ?></p>
</div>


<div class="inline-popup" id="forgot-password" style="display:none;">
<div id="forgeterror" style="display:none; color:#F00;"></div>
<form id="password-form">
<p class="text-center">Restore Password</p>
<input name="" id="forgot_email" type="text" class="form-control validate[required,custom[email]]" placeholder="Email">
<div class="clearfix">
<button name="" type="reset" onClick="$('#forgot-password').hide();" class="btn grey btn-block pull-left">Close</button>
<button name="" type="submit" class="btn orange btn-block pull-right">Restore</button>
</div>

<!--<div class="text-center pad10">
<a href="<?php echo site_url('home/facebooklogin'); ?>" ><img src="<?php echo base_url('images/home');?>/facebook.png" alt="facebook"></a>
<a href="#" ><img src="<?php echo base_url('images/home');?>/twitter.png" alt="twitter"></a>
<a href="<?php echo site_url('home/authticate_google'); ?>"><img src="<?php echo base_url('images/home');?>/google+.png" alt="google+"></a>
<a href="<?php echo site_url('home/linkedin'); ?>"><img src="<?php echo base_url('images/home');?>/linkdein.png" alt="linkdein"></a>
</div>-->
</form>

</div>


<div id="signin-pop" class="inline-popup" style="display:none;">
<div id="signinerror" style="display:none; color:#F00;"></div>
<form id="loginform">

<input name="" type="text" id="signin_email"  class="form-control validate[required,custom[email]]" placeholder="Email">
<input name="" type="password" id="signin_password" class="form-control validate[required]" placeholder="Password">
<div class="clearfix">
<p class="pull-left"><a href="#" onclick="$('#signin-pop').hide(); $('#forgot-password').show();">Forgot Password?</a></p>
<input type="submit" value="Sign In" class="btn orange btn-block pull-right" />

</div>

<div class="text-center pad10">
<a href="<?php echo site_url('home/facebooklogin'); ?>" ><img src="<?php echo base_url('images/home');?>/facebook.png" alt="facebook"></a>
<a href="<?php echo site_url('home/twitterlink'); ?>" ><img src="<?php echo base_url('images/home');?>/twitter.png" alt="twitter"></a>
<a href="<?php echo site_url('home/authticate_google'); ?>" ><img src="<?php echo base_url('images/home');?>/google+.png" alt="google+"></a>
<a href="<?php echo site_url('home/linkedin'); ?>"  ><img src="<?php echo base_url('images/home');?>/linkdein.png" alt="linkdein"></a>
</div>
</form>

</div></li>

<?php

 if($this->session->userdata('user_id')!=TRUE) { ?>

<li><a href="javascript:void(0);" onClick="$('#signin-pop').hide(); $('#signup-pop').toggle(); ">Sign Up</a>

<div class="inline-popup signup-confirmation" id="signup-confirmation" style="display:none;">
<h3 class="text-center" id="signupdata"></h3>
<!--<h3><a href="<?php echo site_url('signup/resend_activation') ?>">Click here</a> to resend email</h3>-->

<a href="#" onclick="$('#signup-pop').hide(); $('#signup-confirmation').hide(); $('#signin-pop').show();"  class="btn btn-block orange center-btn">Sign In</a>
</div>
<?php }?>
<div id="signup-pop" class="inline-popup" style="display:none;">
<form id="signup-form">
<input  type="text" id="signup_email" class="form-control validate[required,ajax[ajaxEmailCall],custom[email]]" placeholder="Email">
<input id="signup_password" type="password" class="form-control validate[required]" placeholder="Password">
<input name="" type="password" class="form-control validate[required,equals[signup_password]]" placeholder="Confirm Password">
<div class="clearfix">
<button name="" type="reset" onClick="$('#signup-pop').hide();" class="btn grey btn-block pull-left">Close</button>
<input type="submit" value="Sign Up" class="btn orange btn-block pull-right" />
<!--<button name="" id="submitsignup"  class="btn orange btn-block pull-right">Sign Up</button>
-->
</div>

<div class="text-center pad10">
<a href="<?php echo site_url('home/facebooklogin'); ?>"><img src="<?php echo base_url('images/home');?>/facebook.png" alt="facebook"></a>
<a href="<?php echo site_url('home/twitterlink'); ?>"><img src="<?php echo base_url('images/home');?>/twitter.png" alt="twitter"></a>
<a href="<?php echo site_url('home/authticate_google'); ?>" ><img src="<?php echo base_url('images/home');?>/google+.png" alt="google+"></a>
<a href="<?php echo site_url('home/linkedin'); ?>"><img src="<?php echo base_url('images/home');?>/linkdein.png" alt="linkdein"></a>
</div>
</form>
</div>
</li>
</ul>
</div>
</div><!-- /.navbar-collapse -->
</div><!-- /.container -->
</nav>

<!-- side menu -->
<div id="resp-menu">
<a id="responsive-menu" href="#sidr"><img src="<?php echo base_url('images/home');?>/menu-icon.png" alt="Menu"></a>
<div id="sidr">
<ul class="" id="side-bar-menu" style="display: none;">
<li class="active"><a href="<?php echo base_url('products'); ?>">Products</a>
<ul>
<?php foreach($catList as $cat ) { ?>
<li><a href="<?php echo base_url('products/'.$cat['slug']); ?>"><?php echo $cat['title'] ?></a></li>

<?php } ?>
</ul>
</li>

<li class="active"><a href="<?php echo base_url('topics'); ?>">Topics</a>
<ul>
<?php foreach($topiclist as $topic ) { ?>
<li><a href="<?php echo base_url('topics/view/'.$topic['cat_id']); ?>"><?php echo $topic['title'] ?></a></li><?php } ?>
</ul>
</li>

<li class="active"><a href="<?php echo base_url('services'); ?>">Services</a>
<ul>
<li><a href="<?php echo base_url('services/view/peptide'); ?>">Peptide Level Determation</a></li>
<li><a href="<?php echo base_url('services/view/custom'); ?>">Custom Synthesis</a></li>
</ul>
</li>

<li class="active"><a href="<?php echo base_url('support'); ?>">Technical Support</a>
<ul>
<li><a href="<?php echo base_url('support/view/sample_preparation'); ?>">Sample Preparation</a></li>
<li><a href="<?php echo base_url('support/view/faqs'); ?>">FAQ</a></li>
<li><a href="<?php echo base_url('support/view/catalog'); ?>">Catalog Request</a></li>
<li><a href="<?php echo base_url('support/view/survey'); ?>">Customer Satisfaction</a></li>
</ul>
</li>

<li><a href="<?php echo base_url('about'); ?>">About Us</a></li>
<li><a href="<?php echo base_url('contact'); ?>">Contact us</a></li>
<li><a href="<?php echo base_url('privacy'); ?>">Privacy Policy</a></li>
<li><a href="<?php echo base_url('terms'); ?>">Terms of Use</a></li>
<li><a href="<?php echo base_url('order_information'); ?>">Order Information</a></li>
</ul>
</div>
</div>
 
<div id="social-confirmation" class="social-popovers" style="display:none;">
<div class="popover-overlay"></div>
<div class="scp-contents">
<h2>Social Network Confirmation</h2>
<p>
<?php echo $this->session->flashdata('social_confirm'); ?>
</p>
<div class="text-right">
<a href="#" onClick="$('#social-confirmation').hide();" class="btn grey">Cancel</a>
<a href="#" onClick="$('#social-confirmation').hide(); $('#signup-pop').hide();" class="btn orange">Ok</a>
</div>
</div>
</div>

<div id="forgot-password-confirmation" class="social-popovers forgot-password-confirmation" style="display:none;">
<div class="popover-overlay"></div>
<div class="scp-contents">
<h2>Forget Password Confirmation</h2>
<p>
<?php echo $this->session->flashdata('forgot-password-confirmation'); ?>
</p>
<div class="text-right">

<a href="#" onClick="$('#forgot-password-confirmation').hide();" class="btn orange">Ok</a>
</div>
</div>
</div>

<div id="account-confirmation" class="social-popovers account-activation" style="display:none;">
<div class="popover-overlay"></div>
<div class="scp-contents">
<h2>Account Activation</h2>
<p>
<?php echo $this->session->flashdata('account-activation'); ?>
</p>
<div class="text-right">

<a href="#" onClick="$('#account-confirmation').hide(); $('.account-activation').hide();" class="btn orange">Ok</a>
</div>
</div>
</div>
<script>
  
   
    $('#loginform').validationEngine('attach');
    $('#password-form').validationEngine('attach');
	 $('#searchform').validationEngine('attach');
  
     
      showHide('','signup-custom');
       $('#signup-form').validationEngine('attach');
    
    </script>
    
    
    <script>
	$(document).ready(function() {
		
		$('#password-form').submit(function(e){
   
   e.preventDefault();
     $.ajax({
            url:"<?php echo base_url(); ?>home/validate_email_address_password",
            type:"post",
            dataType:"json",
            data:{
               "forgot_email":$('#forgot_email').val(), 
                
            },
            success:function(data){
                
                   
				    if(data.error==true) {
						
						if($('#password-form').validationEngine('validate'))
        $.ajax({
            url:"<?php echo base_url(); ?>signup/forgotpass",
            type:"post",
            dataType:"json",
            data:{
               "forgot_email":$('#forgot_email').val(), 
                
            },
            success:function(data){
                
                   
				    location.reload();
                   
				   
                
                    }
                
            });
           
           
           
      
						}
						
						else  {
                   
				   $('#forgeterror').text("No registerd user with this email");
                    $('#forgeterror').show();
					
                
                    }
                
          
			}
		    });
   
   
        
        
    });
       
	    $('#loginform').submit(function(e){
           e.preventDefault();
		 
		   if($('#remember_me').is(':checked')) {
         
		 var remember=$('#remember_me').val();
		   }
		   else {
			   remember=0;
			   }
           $.ajax({
              url:"<?php echo base_url('home/signin'); ?>",
              type:"post",
              dataType:"json",
              data:{
                  "signin_email":$("#signin_email").val(),
                  "signin_password":$("#signin_password").val(),
                  "remember_me":remember,
                  
                },
              success:function(data){
                  
                if(data.error==false){
                    
                 window.location="<?php echo base_url('myaccount/home'); ?>";   
               
			    }else if(data.error=='refer') {
					//console.log(data);
					window.location=data.retrunurl;  
					}
				
				else {
                    
                   $('#signinerror').text(data.msg);
                    $('#signinerror').show();
					
                if(data.msg=='banned') {
					
					$('.signin-custom').hide();
					$('.ban-custom').show();
					
					}
				}
                  
                }
                
                
               
           });
            
            
            
        });
	

	$('#signup-form').submit(function(e){
		
		e.preventDefault();
	 
	 if($('#signup-form').validationEngine('validate')) {
   
	$.ajax({
        
         url:"<?php echo base_url('signup') ?>",
         
		 type:"post",
         
		 dataType:"json",
         
		 data: 
		 	{
             "signup_password":$('#signup_password').val(),
             "signup_email":$('#signup_email').val(),  
            },
            success:function(data) {
				
				$('#signupdata').text(data.msg);
				
				$('#signup-pop').hide();
			    
				$('#signup-confirmation').show();
			
       		 }
            
        });
	
	}
	
	
	else {
		
		return false;
	
	}

	});

		
	$('#side-bar-menu').show();	
		
	});
 

   
 
 </script>
