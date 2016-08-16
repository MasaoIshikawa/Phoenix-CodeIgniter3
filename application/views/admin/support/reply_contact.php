
  <div id="page-body" class="clearfix">
  <?php $this->load->view('admin/left-menu'); ?>
    <!-- end left menu -->
    
    <div id="right-contents"> 
      <!--page title -->
      <div class="page-title clearfix">
        <h1 class="pull-left">Reply</h1>
      </div>
      <!--/page title -->
      <div class="row">
        <div class="col-sm-7">
          <form class="reply-form" action="<?php echo base_url('admin/support/send/'.$contact['support_id']); ?>" method="post">
            <p class="clearfix">
              <label>Name:</label>
              <span>
              <input type="text" style="margin:0" class="form-control" readonly="" value="<?php echo $contact['first_name']." ".$contact['last_name']; ?>" >
              </span> </p>
            <p class="clearfix">
              <label>Email:</label>
              <span>
              <input type="text" style="margin:0;" class="form-control"  readonly="" value="<?php echo $contact['email']; ?>">
              </span> </p>
            <p>
              <input type="text" placeholder="Subject" value="<?php echo $contact['request_name']; ?>" class="form-control validate[required]" id="subject" name="subject" >
            </p>
            <p>
              <textarea placeholder="Enter Message" class="form-control validate[required]" id="message" rows="10" cols="10" name="message"></textarea>
            </p>
            <div class="text-right view-submit">
              <button class="link-btn green" type="submit" name="">Reply</button>
              <button class="link-btn grey" type="reset" onClick="window.location='<?php echo base_url('admin/support'); ?>'" name="">Back</button>
            </div>
          </form>
          <!-- end reply form --> 
        </div>
      </div>
    </div>
    <!-- end right contents --> 
  </div> 
