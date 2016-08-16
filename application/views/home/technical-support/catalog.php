<?php if($this->session->flashdata('contact_support_confirmation')==TRUE) { ?>
	<div id="contactus-confirmation" class="popup-outer">
<div class="container">
<div class="col-sm-4 margin-auto">
<div class="popup-content text-center">
<div class="text-right"><a href="javascript:void(0);" onClick="$('#contactus-confirmation').hide();" class="button-close"><img src="<?php echo base_url('images/home/close.gif'); ?>" width="22" height="22" alt=""></a></div>
<p><?php echo $this->session->flashdata('contact_support_confirmation');  ?></p>
</div>
</div>
</div>
</div>
<?php } ?>

<div id="page-body">
<div class="container">
<h1 class="page-title">Catalog Request</h1>

<div class="row catalog-overview">
<div class="col-sm-5"><img src="<?php echo base_url('images/home'); ?>/catalog.jpg" class="img-responsive" alt=" "></div>
<div class="col-sm-7">
<h3><?php echo $content['title']; ?></h3>
<p><?php echo $content['data']; ?></p>
</div>	<!-- end col -->
</div>	<!-- end row -->

<form class="cr-form" id="catalogform" method="post" action="<?php echo base_url('support/savecatalog') ?>">
<h4>Request your copy today</h4>
<div class="row">
<div class="col-sm-6">
<input name="first_name" type="text" class="form-control validate[required,custom[onlyLetterNumber]]" placeholder="First Name">
<input name="last_name" type="text" class="form-control validate[required,custom[onlyLetterNumber]]" placeholder="Last Name">
<input name="email" type="text" class="form-control validate[required,custom[email]]" placeholder="Email">
<input name="company_name" type="text" class="form-control validate[required,custom[onlyLetterNumber]]" placeholder="Company Name">
<input name="street" type="text" class="form-control validate[required]" placeholder="Street Address">


</div>	<!-- end col -->
<div class="col-sm-6">
<input name="billing" type="text" class="form-control validate[required]" placeholder="Building / Room">
<input name="zip" type="text" class="form-control validate[required]" placeholder="Zip Code">
<input name="city" type="text" class="form-control validate[required,custom[onlyLetterNumber]]" placeholder="City">
<input name="state" type="text" class="form-control validate[required,custom[onlyLetterNumber]]" placeholder="State">
<input name="country" type="text" class="form-control validate[required,custom[onlyLetterNumber]]" placeholder="Country">
<div class="captcha pull-right"><div id="captchaimg"><?php echo $captcha; ?></div>
<br clear="all" />
		<input name="code" type="text" id="code" class="validate[required,equals[verify]]">
        <input name="verify" type="hidden" id="verify" value="<?php echo $worddata; ?>">
        <img src="<?php echo base_url('images'); ?>/refresh.jpg" width="25" alt="" id="refresh" />
</div>
</div>	<!-- end col -->
</div>	<!-- end row -->
<div class="clearfix">
<button name="" type="submit" class="btn orange pull-right">Submit</button>

</div>
</form>
</div>
</div>

<?php //$this->load->view($captcha); ?>	
<script>
$('#catalogform').validationEngine('attach');

$(document).ready(function() {
	$('img#refresh').click(function() {  
			
			
	$.ajax({
        
         url:"<?php echo base_url('support/refresh_captcha') ?>",
         
		 type:"post",
         dataType:"json",
		 
		 data: 
		 	{
              
            },
            success:function(data) {
				
				$('#captchaimg').html(data.captcha);
				$('#verify').val(data.worddata);
				
       		 }
            
        });
	
	

	});

		
		
	
	 });
	 
	
</script>
