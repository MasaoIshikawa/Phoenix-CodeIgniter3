
<?php if($this->session->userdata('admin_id')) { ?>

<header>
<div class="container-fluid">
<nav class="navbar">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#"><img src="<?php echo base_url('images/admin'); ?>/logo.png" alt="PHOENIX Pharmaceuticals, INC" title="PHOENIX Pharmaceuticals, INC" /></a>
   
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="navigation-collapse">
<ul class="nav navbar-nav">
<li class="<?php if($header_sel=='content') echo 'active'; ?>"> <a href="<?php echo base_url('admin/content'); ?>">Content Controls</a></li>
<li class="<?php if($header_sel=='user') echo 'active'; ?>"><a href="<?php echo base_url('admin/users'); ?>">User Administration</a></li>
<li  class="<?php if($header_sel=='products') echo 'active'; ?>" ><a href="<?php echo base_url('admin/products'); ?>">Products Controller</a></li>
<li class="<?php if($header_sel=='orders') echo 'active'; ?>" ><a href="<?php echo base_url('admin/orders'); ?>">Orders</a></li>
</ul>
</div>

<div id="admin-area">
<span>Administrator Area</span>
Welcome <?php echo $this->session->userdata('first_name')." ".$this->session->userdata('last_name'); ?> | <a href="<?php echo base_url('admin/logout'); ?>" class="logout">Logout</a>
</div>
</nav>
</div>
</header>


<?php } else {  ?>

<header>
<div class="container-fluid">
<nav class="navbar">

<a class="navbar-brand" href="#"><img src="<?php echo base_url('images/admin'); ?>/logo.png" alt="PHOENIX Pharmaceuticals, INC" title="PHOENIX Pharmaceuticals, INC" /></a>
   
<div id="admin-area">
<span>Administrator Area</span>
</div>
</nav>
</div>
</header>
<?php } ?>
