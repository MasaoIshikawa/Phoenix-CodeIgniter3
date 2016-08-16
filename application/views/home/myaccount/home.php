<script>
$(document).ready(function() {
	$("#social").click(function() {
		
		$('.social-popovers').hide();
		
		});
	
	});
</script>
<?php if(!empty($edit_account_confirmation)) {  ?>
<div id="social-confirmation" class="social-popovers">
<div class="popover-overlay"></div>
<div class="scp-contents">
<h2>Account Update Confirmation</h2>
<p>
<p class="text-center"><?php echo $edit_account_confirmation['data']; ?></p>
</p>
<div class="text-right">

<a href="javascript:void(0)" id="social" class="btn orange">Ok</a>
</div>
</div>
</div>
<?php } ?>
<div id="page-body">
<div class="container">
<h1>My Account</h1>

<div class="account-tabs">
<?php $this->load->view('home/myaccount/tabs'); ?>
</div>	<!-- end account tabs -->

<div class="account-info-cont clearfix">
<div class="account-media">
<?php if($userdata['profile_image']!='') { ?>
<a href="javascript:void(0)" class="upload_img">
<img id="profileim" src="<?php echo base_url('uploads/profileimage/'.$userdata['profile_image']);?>" class="img-responsive" alt=" "></a>
<?php } else { ?>
<a href="javascript:void(0)" class="upload_img">
<img id="profileim" src="<?php echo base_url();?>images/home/account-pic.jpg" class="img-responsive" alt=" "></a>
<?php } ?>
<div class="edit-account"><a href="<?php echo base_url('myaccount/home/edit/'.$this->session->userdata('user_id')); ?>" class="btn btn-block orange">Edit my Account</a>
<?php /*?><?php if(!empty($edit_account_confirmation)) {  ?>
<div class="inline-popup">
<div class="text-right" style="position:absolute;top:5px;right:5px"><a href="#" onclick="$('.inline-popup').hide();"><img src="<?php echo base_url('images/home');?>/close.gif" alt=" "></a></div>
<p class="text-center"><?php echo $edit_account_confirmation['data']; ?></p>
</div>	
<?php } ?><?php */?>
</div>
</div>

<div class="account-info">
<h2><?php echo $userdata['first_name']." ".$userdata['last_name']; ?></h2>
<p class="clearfix">
<label>Company Name:</label>
<span><?php echo $userdata['company'] ?></span>
</p>

<p class="clearfix">
<label>Email Address:</label>
<span><?php echo $userdata['email'] ?></span>
</p>

<p class="clearfix">
<label>Phone Number:</label>
<span><?php echo $userdata['phone'] ?></span>
</p>

<p class="clearfix">
<label><strong>Shipping Address:</strong></label>
<span><?php echo $userdata['address'] ?></span>
</p>

<p class="clearfix">
<label>City:</label>
<span><?php echo $userdata['city'] ?></span>
</p>

<p class="clearfix">
<label>State:</label>
<span><?php echo $userdata['state'] ?></span>
</p>

<p class="clearfix">
<label>Country:</label>
<span><?php echo $userdata['country'] ?></span>
</p>

<p class="clearfix">
<label>Postal Code:</label>
<span><?php echo $userdata['zip'] ?></span>
</p>

<?php $i=1; foreach($add_info as $info) { ?>
<?php if($info['address_type']=='shipping') { ?>
<h2 class="hidden-xs">&nbsp;</h2>
<p class="clearfix">
<label><strong>Shipping Address:</strong></label>
<span><?php echo $info['billing_address'] ?></span>
</p>

<p class="clearfix">
<label>City:</label>
<span><?php echo $info['city'] ?></span>
</p>

<p class="clearfix">
<label>State:</label>
<span><?php echo $info['state'] ?></span>
</p>

<p class="clearfix">
<label>Country:</label>
<span><?php echo $info['country'] ?></span>
</p>

<p class="clearfix">
<label>Postal Code:</label>
<span><?php echo $info['postal_code'] ?></span>
</p>


<?php $i++; } } ?>
</div>	<!-- end col -->


<div class="account-info last">

<?php $i=1; foreach($add_info as $info) { ?>
<?php if($info['address_type']=='billing') { ?>
<h2 class="hidden-xs">&nbsp;</h2>
<p class="clearfix">
<label><strong>Billing Address:</strong></label>
<span><?php echo $info['billing_address'] ?></span>
</p>

<p class="clearfix">
<label>City:</label>
<span><?php echo $info['city'] ?></span>
</p>

<p class="clearfix">
<label>State:</label>
<span><?php echo $info['state'] ?></span>
</p>

<p class="clearfix">
<label>Country:</label>
<span><?php echo $info['country'] ?></span>
</p>

<p class="clearfix">
<label>Postal Code:</label>
<span><?php echo $info['postal_code'] ?></span>
</p>


<?php $i++; } } ?>
</div>	<!-- end col -->
</div>
</div>
</div>
