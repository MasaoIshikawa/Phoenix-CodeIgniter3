<div id="page-body">
    <div class="container-fluid">
      <div class="row">
        <!--Admin Form -->
        <div class="admin-form">
<h2>Admin Login</h2>
        <form action="<?php echo base_url('admin/login'); ?>" method="post" >
        <?php if(!empty($error)){ ?> <p style="color:red;"> <?php echo $error; ?></p> <?php } ?>
        <p><input type="text" name="email" id="email" placeholder="Your Email" class="form-control validate[required,custom[email]]"></p>
        <p><input type="password" name="password" id="password" placeholder="Password" class="form-control validate[required]"></p>
        <p class="clearfix"><button name="" type="reset" class="link-btn grey">Clear</button> <button name="" type="submit" class="link-btn blue">Login</button></p>
        <p class="text-center"><a href="<?php echo base_url('admin/forgot'); ?>" class="forgot-link">Forgot Password</a></p>
        </form>
        </div>
        <!--/Admin form -->
        
      </div>
    </div>
  </div>
