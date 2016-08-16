<div id="page-body">
    <div class="container-fluid">
      <div class="row">
        <!--Admin Form -->
        <div class="admin-form">
<h2>Forgot Password</h2>
        <form action="<?php echo base_url('admin/forgot/send'); ?>" method="post">
        <p><input type="text" placeholder="Your Email" id="email" name="email" class="form-control validate[required,custom[email]]"></p>
        <p class="clearfix"><button name="" onClick="window.location='<?php echo base_url('admin'); ?>'" type="button" class="link-btn grey">Cancel</button> <button name="" type="submit" class="link-btn blue">Restore</button></p>
        </form>
        </div>
        <!--/Admin form -->
        
      </div>
    </div>
  </div>
