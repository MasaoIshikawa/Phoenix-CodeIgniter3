
<ul class="clearfix">
<li class="<?php if($sel=='profile') echo 'active'; ?>" ><a href="<?php echo base_url('myaccount'); ?>">Profile</a></li>
<li class="<?php if($sel=='order') echo 'active'; ?>"><a href="<?php echo base_url('myaccount/order_history'); ?>">My Order History</a></li>
<li class="<?php if($sel=='contact') echo 'active'; ?>"><a href="<?php echo base_url('myaccount/contact_support'); ?>">Contact Support</a>
<div id="contact-support-confirm" class="inline-popup cs-confirm" style="display:none;">
<p class="text-center"><?php echo $confirmation['data']; ?></p>
</div>	
</li>
</ul>
