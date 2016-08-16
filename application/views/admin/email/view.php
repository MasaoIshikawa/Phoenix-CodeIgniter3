 
<div id="page-body" class="clearfix">
<?php $this->load->view('admin/left-menu'); ?>	<!-- end left menu -->

<div id="right-contents">
<!--page title -->
<div class="page-title clearfix">
<h1 class="pull-left">View Outbound Email</h1>
</div>	<!--/page title -->
<div class="row">
<div class="col-md-7 add-form view-outbound">
<form class="form-horizontal">
<dl class="dl-horizontal">
   <dt> <label class="control-label">Subject</label></dt>
      <dd><?php echo $email['subject']; ?></dd>

    <dt><label class="control-label">Message</label></dt>
      <dd><?php echo $email['content']; ?></dd>
      </dl>
      <p class="view-submit text-right"><button type="button" onClick="window.location='<?php echo base_url('admin/email'); ?>' "class="link-btn grey">Back</button> <button type="button"  onClick="window.location='<?php echo base_url('admin/email/edit/'.$email['email_id']); ?>' " class="link-btn green">Edit</button> </p>
</form>
</div>
</div>
</div>
	<!-- end right contents -->
</div>	
