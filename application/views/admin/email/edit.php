<div id="page-body" class="clearfix">
<?php $this->load->view('admin/left-menu'); ?>	<!-- end left menu -->

<div id="right-contents">
<!--page title -->
<div class="page-title clearfix">
<h1 class="pull-left">Edit Outbound Email</h1>
</div>	<!--/page title -->
<div class="row">
<div class="col-md-7 add-form edit-outbound">
<form action="<?php echo base_url('admin/email/save/'.$email_id); ?>" method="post" class="form-horizontal">
<dl class="dl-horizontal">
   <dt> <label for="inputsubject" class="control-label">Subject</label></dt>
      <dd><input type="text" name="subject" class="form-control validate[required]" value="<?php echo $email['subject']; ?>" id="inputsubject" placeholder=""></dd>

    <dt><label for="inputmessage" class="control-label">Message</label></dt>
      <dd><textarea class="form-control validate[required]" id="inputmessage" name="content"  placeholder=""><?php echo $email['content']; ?></textarea></dd>
      </dl>
      <p class="text-right view-submit"><button type="submit" class="link-btn green">Save</button> <button type="button" onClick="window.location='<?php echo base_url('admin/email'); ?>'" class="link-btn grey">Cancel</button></p>
</form>
</div>
</div>
</div>
	<!-- end right contents -->
</div>
