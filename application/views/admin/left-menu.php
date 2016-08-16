<?php if($header_sel=='user'){ ?>
<div id="left-menu" class="">
<ul>
<li class="<?php if($sel=='users') echo 'active'; ?>"><a href="<?php echo base_url('admin/users'); ?>" class="admin-link">Admin Users</a></li>
<li class="<?php if($sel=='public_users') echo 'active'; ?>"><a href="<?php echo base_url('admin/publicusers'); ?>" class="public-link">Public Users</a></li>
<li class="<?php if($sel=='contacts') echo 'active'; ?>"><a href="<?php echo base_url('admin/contacts'); ?>" class="contact-link">Contacts</a></li>
<!--<li class="<?php if($sel=='support') echo 'active'; ?>"><a href="<?php echo base_url('admin/support'); ?>" class="contact-link">Internal Support</a></li>-->
</ul>
</div>

<?php } else if($header_sel=='content') { ?>
<div id="left-menu" class="">
<ul>
<li class="<?php if($sel=='content') echo 'active'; ?>"><a href="<?php echo base_url('admin/content'); ?>" class="meta-link"><span>Admin Content and <br /> Meta Controller</span></a></li>
<li class="<?php if($sel=='email') echo 'active'; ?>"><a href="<?php echo base_url('admin/email'); ?>" class="obe-link"><span>Outbound Email</span></a></li>
<li class="<?php if($sel=='faqs') echo 'active'; ?>"><a href="<?php echo base_url('admin/faqs'); ?>" class="obe-link"><span>FAQ</span></a></li>
</ul>
</div>

<?php } else if($header_sel=='products') {?>

<div id="left-menu" class="">
<ul>
<li class="<?php if($sel=='products') echo 'active'; ?>"><a href="<?php echo base_url('admin/products'); ?>" class="product-link">Products</a></li>
<li class="<?php if($sel=='categories') echo 'active'; ?>"><a href="<?php echo base_url('admin/categories'); ?>" class="categories-link">Categories</a></li>
<li class="<?php if($sel=='topics') echo 'active'; ?>"><a href="<?php echo base_url('admin/topics'); ?>" class="topics-link">Topics</a></li>
</ul>
</div>
<?php } else if($header_sel=='orders'){ ?>
<div id="left-menu" class="">
<ul>
<li class="active"><a href="<?php echo base_url('admin/orders'); ?>" class="product-link">Orders</a></li>
</ul>
</div>

<?php } ?>
