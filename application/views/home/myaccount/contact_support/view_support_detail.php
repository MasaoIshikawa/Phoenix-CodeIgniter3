<div id="page-body">
<div class="container">
<h1>Support Detail</h1>

<div class="account-tabs">
<?php $this->load->view('home/myaccount/tabs'); ?>
</div>	<!-- end account tabs -->
<?php $request=$requestdata['request']; ?>
<div class="table-responsive borderless-table support-table">
<table class="table">
<tbody><tr>
<td><strong style="padding-right:5px;">Request Name:</strong><?php echo $request['request_name']; ?></td>
<td><strong style="padding-right:5px;">Order Detail:</strong> <?php echo $request['order_number']; ?></td>
<td class="text-center"><strong>Action:</strong></td>
</tr>

<tr>
<td><strong style="padding-right:5px;">Date:</strong> <?php echo $request['date']; ?></td>
<td><strong style="padding-right:5px;">Status:</strong> <?php  if($request['isread']==0) echo 'Pending'; else echo 'Approved' ?></td>
<td class="text-center"><div class="inline-action"><a href="<?php echo site_url('myaccount/contact_support/delete_request/'.$request['contact_id']) ?>" title="delete"><img src="<?php echo base_url() ?>images/home/delete.png" alt="delete"></a></div></td>
</tr>
</tbody></table>
</div>	<!-- end table container -->
<hr style="margin-top:0">

<div class="row support-detail">
<div class="col-sm-2"><strong>Question:</strong></div>
<div class="col-sm-10">
<p><?php echo $request['message'] ?></p>
</div>
</div>	<!-- end row -->

<div class="row support-detail">
<?php
$i=0;
 foreach($requestdata['replies'] as $reply) { ?>
<div class="col-sm-2"><strong><?php if($i%2==0) { ?>Support Answer:<?php } else { ?>Question:<?php } ?></strong></div>
<div class="col-sm-10">

<p><?php echo $reply['message']; ?></p>

</div>
<?php $i++; } ?>
</div>	<!-- end row -->
<?php if(count($requestdata['replies'])>0) {  ?>
<form class="submit-support" id="supportform">

<input name="request_name" id="request_name" value="<?php echo $request['request_name']; ?>" type="hidden" class="form-control validate[required]">
<input name="reply_id" id="reply_id" type="hidden" value="<?php echo $request['contact_id']; ?>" class="form-control validate[required]">
<input name="order_number" id="order_number" value="<?php echo $request['order_number']; ?>" type="hidden" class="form-control validate[required]">
<input name="priority" id="priority" value="<?php echo $request['priority']; ?>" type="hidden" class="form-control validate[required]">

<textarea name="message" id="message" cols="20" rows="20" class="form-control validate[required]" placeholder="Enter you answer here ..."></textarea>
<button name="" type="submit" class="btn green">Submit</button>
</form>
<?php } ?>
</div>
</div>

<script>
 $('#supportform').validationEngine('attach');
$(document).ready(function(){
	
	$('#supportform').submit(function(e){
		
		e.preventDefault();
	 
	 if($('#supportform').validationEngine('validate')) {
   
	$.ajax({
        
         url:"<?php echo base_url('myaccount/contact_support/update') ?>",
         
		 type:"post",
         
		 dataType:"json",
         
		 data: 
		 	{
             "request_name":$('#request_name').val(),
             "order_number":$('#order_number').val(),
			 "priority":$('#priority').val(),
			 "reply_id":$('#reply_id').val(),
             "message":$('#message').val(), 
            },
            success:function(data) {
			
			location.reload();
			}
        });
	
	}
	
	
	else {
		
		return false;
	
	}

	});

		
	
	
	
	});
</script>
