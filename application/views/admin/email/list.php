  
<div id="page-body" class="clearfix">
<?php $this->load->view('admin/left-menu'); ?>	<!-- end left menu -->

<div id="right-contents">
<!--page title -->
<div class="page-title clearfix">
<h1 class="pull-left">Admin Outbound Email Controller</h1>
</div>	<!--/page title -->

<div class="table-content">
<div class="table-responsive">
<table>
<tr>
<th><a href="#">Subject</a></th>
<th style="width: 65%;"><a href="#">Message</a></th>
<th class="text-center">Actions</th>
</tr>
<?php foreach($emails as $email){ $i=$email['email_id']; ?>
<tr>
<td><?php echo $email['subject']; ?></td>
<td><?php echo $email['content']; ?></td>
<td class="actions text-center">
<div class="action-pops"><a href="<?php echo base_url('admin/email/view/'.$email['email_id']); ?>" title="edit"><img src="<?php echo base_url('images/admin'); ?>/view-icon.png" alt="view"></a></div>
<div class="action-pops"><a href="<?php echo base_url('admin/email/edit/'.$email['email_id']); ?>" title="edit"><img src="<?php echo base_url('images/admin'); ?>/edit-icon.png" alt="edit"></a></div>

</td>
</tr>

<?php } ?>

</table>
</div>
</div>	<!-- end table area --> 
</div>	<!-- end right contents -->
</div>	
