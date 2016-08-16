<div id="page-body" class="clearfix">
<?php $this->load->view('admin/left-menu'); ?><!-- end left menu -->

<div id="right-contents">
<!--page title -->
<div class="page-title clearfix">
<h1 class="pull-left">Admin Contacts Controller</h1>
</div>	<!--/page title -->

<div class="table-content">
<div class="table-responsive">
<table>
<tr>
<th>Date</th>
<th>Name</th>
<th>Subject</th>

<th class="text-center">Actions</th>
</tr>
<?php foreach($contacts as $contact){ $i=$contact['contact_id']; ?>
<tr style="<?php if($contact['isread']==0) echo 'font-weight:bold;'; ?> ">
<td><?php echo $contact['date']; ?></td>
<td><?php echo $contact['first_name']." ".$contact['last_name']; ?></td>
<td><?php echo $contact['subject']; ?></td>

<td class="actions text-center">
<div class="action-pops"><a href="<?php echo base_url('admin/contacts/view/'.$contact['contact_id']); ?>" title="view"><img src="<?php echo base_url('images/admin'); ?>/view-icon.png" alt="view"></a></div>
<div class="action-pops"><a href="<?php echo base_url('admin/contacts/reply/'.$contact['contact_id']); ?>" title="reply"><img src="<?php echo base_url('images/admin'); ?>/reply-icon.png" alt="reply"></a></div>
<div class="action-pops"><a href="javascript:void(0);" onClick="$('#<?php echo $i; ?>').show();" title="remove"><img src="<?php echo base_url('images/admin'); ?>/remove-icon.png" alt="remove"></a>
  <div id="<?php echo $i; ?>" class="inline-popup" style="display:none;">
                <p>Are you sure you want to do this? <span>This action is not reversible</span><span> <button onClick="window.location='<?php echo base_url('admin/contacts/delete/'.$i); ?>'" class="link-btn grey">Yes</button> <button onClick="$('#<?php echo $i; ?>').hide();" class="link-btn grey">No</button></span></p>
  </div>
</td>
</tr>

<?php } ?>
</table>
</div>
</div>	<!-- end table area --> 
</div>	<!-- end right contents -->
</div>
