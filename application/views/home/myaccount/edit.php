<script>

    $(document).ready(function(e) {

		$('.upload_img').click(function() {
        
		    $('.upload').click();
        
		});
		
			$('#file_upload').fileupload({
			url: '<?php echo base_url('myaccount/home/addprofile_img'); ?>',
			dataType: 'json',
			done: function (e, data) {				
				$('#reci_image').val(data._response.result[1]);
				$('#profileim').attr("src", data._response.result[0]);
				
			}
		});
	});
</script>

<div id="page-body">
<div class="container">
<h1>My Account</h1>

<div class="account-tabs">
<?php $this->load->view('home/myaccount/tabs'); ?>
</div>	<!-- end account tabs -->
<form method="post" id="file_upload" style="display:none;">
            <input type="file" accept="image/*" class="upload signin long_btn" name="file" >
        </form>
<form class="edit-info" id="info-edit" method="post" action="<?php echo site_url('myaccount/home/save') ?>">
<div class="account-info-cont clearfix">

<div class="account-media">
<?php if($userdata['profile_image']!='') { ?>
<a href="javascript:void(0)" class="upload_img">
<img id="profileim" src="<?php echo base_url('uploads/profileimage/'.$userdata['profile_image']);?>" class="img-responsive" alt=" "></a>
<?php } else { ?>
<a href="javascript:void(0)" class="upload_img">
<img id="profileim" src="<?php echo base_url();?>images/home/account-pic.jpg" class="img-responsive" alt=" "></a>
<?php } ?>
</div>

<input type="hidden" name="userid" value="<?php echo $userdata['member_id'] ?>" id="userid" />

<input  type="hidden" class="upload_img" value="<?php echo $userdata['profile_image']; ?>"  id="reci_image" name="profile_image">

<div class="account-info shippinginfo">
<input name="user_name" type="text" class="form-control form-control-lg validate[required,custom[onlyLetterNumber]]" value="<?php echo $userdata['first_name']." ".$userdata['last_name']; ?>" >

<p class="clearfix">
<label>Company Name:</label>
<span><input name="company" type="text" class="form-control validate[required,custom[onlyLetterNumber]]"  value="<?php echo $userdata['company'] ?>"></span>
</p>

<p class="clearfix">
<label>Email Address:</label>
<span><input name="email" type="text" value="<?php echo $userdata['email'] ?>" class="form-control validate[required,custom[email]]" ></span>
</p>
<p class="clearfix">
<label>Password:</label>
<span><input name="password" id="password" type="text" class="form-control" ></span>
</p>
<p class="clearfix">
<label>Confirm Password:</label>
<span><input name="" type="text" class="form-control validate[equals[password]]" ></span>
</p>

<p class="clearfix">
<label>Phone Number:</label>
<span><input name="phone" type="text" class="form-control validate[required,custom[onlyLetterNumber]] number" value="<?php echo $userdata['phone'] ?>"></span>
</p>

<p class="clearfix">
<label><strong>Shipping Address:</strong></label>
<span><input name="address" type="text" value="<?php echo $userdata['address'] ?>" class="form-control validate[required]" ></span>
</p>

<p class="clearfix">
<label>City:</label>
<span><input name="city" type="text"  value="<?php echo $userdata['city'] ?>" class="form-control validate[required,custom[onlyLetterNumber]]"></span>
</p>

<p class="clearfix">
<label>State:</label>
<span><input name="state" type="text" value="<?php echo $userdata['state'] ?>" class="form-control validate[required,custom[onlyLetterNumber]]"  /></span>
</p>

<p class="clearfix">
<label>Country:</label>
<span><input name="country" type="text" class="form-control validate[required,custom[onlyLetterNumber]]" value="<?php echo $userdata['country'] ?>" ></span>
</p>

<p class="clearfix">
<label>Postal Code:</label>
<span><input name="zip" value="<?php echo $userdata['zip'] ?>" type="text" class="form-control validate[required,custom[onlyLetterNumber]] number"></span>
</p>

<?php foreach($add_info as $info) { ?>
<?php if($info['address_type']=='shipping')  {?>
<div class="steps">
<h2 class="hidden-xs">&nbsp;</h2><p class="clearfix">
				<label><span class="step_holder"></span></label><a href="javascript:;" onclick="removeInfo(this);" class="remove_link pull-right">X</a></strong></p>
<p class="clearfix">
<label><strong><?php if($info['address_type']=='billing') echo 'Billing Address:';  else echo 'Shipping Address:'; ?></strong></label>
<span><input name="billing_address[]" value="<?php echo $info['billing_address'] ?>" type="text" class="form-control validate[required]" >
<input name="address_type[]" type="hidden" class="form-control" value="<?php echo $info['address_type'] ?>">
</span>
</p>

<p class="clearfix">
<label>City:</label>
<span><input name="city_ad[]" value="<?php echo $info['city'] ?>"  type="text" class="form-control validate[required,custom[onlyLetterNumber]]"></span>
</p>

<p class="clearfix">
<label>State:</label>
<span><input name="state_ad[]" value="<?php echo $info['state'] ?>"  type="text" class="form-control validate[required,custom[onlyLetterNumber]]" ></span>
</p>

<p class="clearfix">
<label>Country:</label>
<span><input name="country_ad[]" type="text" value="<?php echo $info['country'] ?>"  class="form-control validate[required,custom[onlyLetterNumber]]"></span>
</p>

<p class="clearfix">
<label>Postal Code:</label>
<span><input name="zip_ad[]" type="text" value="<?php echo $info['postal_code'] ?>"  class="form-control validate[required,custom[onlyLetterNumber]] number"></span>
</p>
</div>

<?php } } ?>
</div>	<!-- end col -->

<div class="account-info last addinfo">
<?php foreach($add_info as $info) { ?>
<?php if($info['address_type']=='billing') { ?>
<div class="steps"><h2 class="hidden-xs">&nbsp;</h2><p class="clearfix">
				<label><span class="step_holder"></span></label><a href="javascript:;" onclick="removeInfo(this);" class="remove_link pull-right">X</a></strong></p>
<p class="clearfix">
<label><strong><?php if($info['address_type']=='billing') echo 'Billing Address:';  else echo 'Shipping Address:'; ?></strong></label>
<span><input name="billing_address[]" value="<?php echo $info['billing_address'] ?>" type="text" class="form-control validate[required]" >
<input name="address_type[]" type="hidden" class="form-control" value="<?php echo $info['address_type'] ?>">
</span>
</p>

<p class="clearfix">
<label>City:</label>
<span><input name="city_ad[]" value="<?php echo $info['city'] ?>"  type="text" class="form-control validate[required,custom[onlyLetterNumber]]"></span>
</p>

<p class="clearfix">
<label>State:</label>
<span><input name="state_ad[]" value="<?php echo $info['state'] ?>"  type="text" class="form-control validate[required,custom[onlyLetterNumber]]" ></span>
</p>

<p class="clearfix">
<label>Country:</label>
<span><input name="country_ad[]" type="text" value="<?php echo $info['country'] ?>"  class="form-control validate[required,custom[onlyLetterNumber]]"></span>
</p>

<p class="clearfix">
<label>Postal Code:</label>
<span><input name="zip_ad[]" type="text" value="<?php echo $info['postal_code'] ?>"  class="form-control validate[required,custom[onlyLetterNumber]] number"></span>
</p>
</div>

<?php } } ?>
</div>	<!-- end col -->


<div class="clearfix"></div>
<div class="text-right">
<p><a href="javascript:void(0)"  onclick="addinfo_shipping();"class="add-more">Add shipping address</a>
<a href="javascript:void(0)"  onclick="addinfo();"class="add-more">Add billing address</a>
</p>
<button name="" type="submit"  class="btn orange">Submit</button>
<button name="" type="reset" onclick="return_home();" class="btn grey">Cancel</button>
</div>

</div>
</form>
</div>
</div>	

<script type="text/javascript">
function return_home() 
{
	
	window.location.href="<?php echo site_url('myaccount/home'); ?>";
	}
function addinfo(){
		$('.addinfo').append(<?php echo json_encode('<div class="steps">
		
                <h2 class="hidden-xs">&nbsp;</h2><p class="clearfix">
				<label><span class="step_holder"></span></label><a href="javascript:;" onclick="removeInfo(this);" class="remove_link pull-right">X</a></strong></p>
<p class="clearfix">				
<label><strong>Billing Address:</strong></label><span><input name="billing_address[]" type="text" class="form-control validate[required]" ></span>
</p>

<p class="clearfix">
<label>City:</label>
<span><input name="city_ad[]" type="text" class="form-control validate[required,custom[onlyLetterNumber]]">
<input name="address_type[]" type="hidden" class="form-control" value="billing">
</span>
</p>

<p class="clearfix">
<label>State:</label>
<span><input name="state_ad[]" type="text" class="form-control validate[required,custom[onlyLetterNumber]]" ></span>
</p>

<p class="clearfix">
<label>Country:</label>
<span><input name="country_ad[]" type="text" class="form-control validate[required,custom[onlyLetterNumber]]"></span>
</p>

<p class="clearfix">
<label>Postal Code:</label>
<span><input name="zip_ad[]" type="text" class="form-control validate[required,custom[onlyLetterNumber]] number"></span>
</p>
</div>'); ?>);
		var i=1;
		$('.step_holder').each(function(index, element) {
           // $(this).html(i);
			//i++;
        });
	}
	
	function removeInfo(anchor_tag){
		$(anchor_tag).parents('.steps').remove();
		var i=1;
		$('.step_holder').each(function(index, element) {
           // $(this).html(i);
			//i++;
        });
	}
	
function addinfo_shipping(){
		$('.shippinginfo').append(<?php echo json_encode('<div class="steps">
		
                <h2 class="hidden-xs">&nbsp;</h2><p class="clearfix">
				<label><span class="step_holder"></span></label><a href="javascript:;" onclick="removeInfo(this);" class="remove_link pull-right">X</a></strong></p>
<p class="clearfix">				
<label><strong>Shipping Address:</strong></label><span><input name="billing_address[]" type="text" class="form-control validate[required]" ></span>
</p>

<p class="clearfix">
<label>City:</label>
<span><input name="city_ad[]" type="text" class="form-control validate[required,custom[onlyLetterNumber]]">
<input name="address_type[]" type="hidden" class="form-control" value="shipping">
</span>
</p>

<p class="clearfix">
<label>State:</label>
<span><input name="state_ad[]" type="text" class="form-control validate[required,custom[onlyLetterNumber]]" ></span>
</p>

<p class="clearfix">
<label>Country:</label>
<span><input name="country_ad[]" type="text" class="form-control validate[required,custom[onlyLetterNumber]]"></span>
</p>

<p class="clearfix">
<label>Postal Code:</label>
<span><input name="zip_ad[]" type="text" class="form-control validate[required,custom[onlyLetterNumber]] number"></span>
</p>
</div>'); ?>);
		var i=1;
		$('.step_holder').each(function(index, element) {
           // $(this).html(i);
			//i++;
        });
	}
	
	

</script>
