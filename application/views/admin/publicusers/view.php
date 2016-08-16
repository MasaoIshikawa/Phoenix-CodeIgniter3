  
<div id="page-body" class="clearfix">
<?php $this->load->view('admin/left-menu'); ?><!-- end left menu -->

<div id="right-contents"> 
      <!--page title -->
      <div class="page-title clearfix">
        <h1 class="pull-left">View Account Detail</h1>
      </div>
      <!--/page title -->
      
      <div class="row">
        <div class="col-sm-3"><?php if(!empty($user['profile_image'])) { ?><img src="<?php echo base_url('uploads/profileimage/'.$user['profile_image']); ?>" alt="" class="img-responsive img-fit"> <?php } ?></div>
        <div class="col-sm-7">
          <div class="account-inner">
            <dl class="dl-horizontal">
              <dt>First Name:</dt>
              <dd><?php echo $user['first_name']; ?></dd>
              <dt>Last Name:</dt>
              <dd><?php echo $user['last_name']; ?></dd>
              <dt>Joining Date:</dt>
              <dd><?php echo $user['date']; ?></dd>
              <dt>Company Name:</dt>
              <dd><?php echo $user['company']; ?></dd>
              <dt>Phone Number:</dt>
              <dd><?php echo $user['phone']; ?></dd>
              <dt>Email:</dt>
              <dd><?php echo $user['email']; ?></dd>
            </dl>
          </div>
          <div class="clearfix view-submit">
            <p>
              <label for="checkbox-01" class="label-check <?php if($user['isactive']==1) echo 'c-on'; ?>">
                <input type="checkbox"  class="checkbox" <?php if($user['isactive']==1) echo "checked='checked'"; ?>>
                Active</label>
            </p>
            <p>
            <?php $i=$user['member_id']; ?>
            <div class="action-pops"> <button onClick="window.location='<?php echo base_url('admin/publicusers'); ?>'" class="link-btn grey" type="submit">Back</button> </div>
            <div class="action-pops">  <button onClick="window.location='<?php echo base_url('admin/publicusers/ban/'.$user_id); ?>'" class="link-btn green" type="submit"><?php if($user['ban']==1) echo 'Unban'; else  echo "Ban"; ?></button> </div>
            <div class="action-pops">  <button  onClick="$('#<?php echo $i; ?>').show();" class="link-btn grey" type="submit">Remove</button> 
               <div id="<?php echo $i; ?>" class="inline-popup" style="display:none;">
                <p>Are you sure you want to do this? <span>This action is not reversible</span><span> <button onClick="window.location='<?php echo base_url('admin/publicusers/delete/'.$i); ?>'" class="link-btn grey">Yes</button> <button onClick="$('#<?php echo $i; ?>').hide();" class="link-btn grey">No</button></span></p>
             </div>
            </div>
            </p>
          </div>
        </div>
      </div>
    </div>	<!-- end right contents -->
</div>	
<script>
$('.label-check').click('change',function(){
  console.log("TEST");

  $.ajax({
    url:"<?php echo base_url('admin/publicusers/update_status/'.$user_id); ?>",
    type:"POST",
    dataType:"json",
    data:"",
    success:function(data){
      console.log(data);
    }

  });
})
</script>
