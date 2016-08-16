
<div id="page-body">
<div class="container">
<h1>Contact Support</h1>

<div class="account-tabs">
<?php $this->load->view('home/myaccount/tabs'); ?>
</div>	<!-- end account tabs -->

<div class="cs-contents">
<p><?php echo $content['data']; ?></p>
<form id="supportform">
<div class="row">
<div class="col-sm-4">
<h3>Create request</h3>
<input name="request_name" id="request_name" type="text" class="form-control validate[required,custom[onlyLetterNumber]]" placeholder="Name">
<input name="order_number" id="order_number" type="text" class="form-control validate[required]" placeholder="Order Number">
<select name="priority" id="priority" class="form-control">
<option>High</option>
<option>Medium</option>
<option>Low</option>
</select>
</div>	<!-- end col -->

<div class="col-sm-4">
<h4><a href="<?php echo site_url('myaccount/contact_support/requests'); ?>">View Previous Support Requests</a></h4>
<textarea name="message" id="message" cols="10" rows="10" class="form-control validate[required]" placeholder="Message"></textarea>
<div class="text-right">
<button name="" type="submit"  class="btn orange">Send Request</button>
</div>
</div>	<!-- end col -->
</div>	<!-- end row -->
</form>
</div>	<!-- end contact support contacts -->
</div>
</div>
<script>
 $('#supportform').validationEngine('attach');
$(document).ready(function(){
	
	$('#supportform').submit(function(e){
		
		e.preventDefault();
	 
	 if($('#supportform').validationEngine('validate')) {
   
	$.ajax({
        
         url:"<?php echo base_url('myaccount/contact_support/save') ?>",
         
		 type:"post",
         
		 dataType:"json",
         
		 data: 
		 	{
             "request_name":$('#request_name').val(),
             "order_number":$('#order_number').val(),
			 "priority":$('#priority').val(),
             "message":$('#message').val(), 
            },
            success:function(data) {
			
			$('#contact-support-confirm').show(); 
			 setTimeout(function(){ $('#contact-support-confirm').hide(500); },1500);
			document.getElementById("supportform").reset();
		
			}
        });
	
	}
	
	
	else {
		
		return false;
	
	}

	});

		
	
	
	
	});
</script>
