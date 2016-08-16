
<div id="page-body" class="clearfix">
<?php $this->load->view('admin/left-menu'); ?>	<!-- end left menu -->

<div id="right-contents">
<!--page title -->
<div class="page-title clearfix">
<h1 class="pull-left">Public Users Controller</h1>
<a href="<?php echo base_url('admin/publicusers/export_users/csv'); ?>" class="link-btn green pull-right">Export</a>
</div>	<!--/page title -->

<div class="table-content">
<div class="table-responsive">
<table>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Active</th>
<th class="text-center">Actions</th>
</tr>

<?php foreach($users as $user){ $i=$user['member_id']; ?>
<tr>
<td><?php echo $user['first_name']; ?></td>
<td><?php echo $user['last_name']; ?></td>
<td><?php echo $user['email']; ?></td>
<td><?php if($user['isactive']==0 || $user['ban']==1) echo "No"; else  echo "Yes"; ?></td>
<td class="actions text-center">
<div class="action-pops"><a href="<?php echo base_url('admin/publicusers/view/'.$i); ?>" title="View"><img src="<?php echo base_url('images/admin'); ?>/view-icon.png" alt="View"></a></div>

<div class="action-pops"><a href="javascript:void(0);" onClick="$('#<?php echo $i; ?>').show();" title="remove"><img src="<?php echo base_url('images/admin'); ?>/remove-icon.png" alt="remove"></a>
  <div id="<?php echo $i; ?>" class="inline-popup" style="display:none;">
                <p>Are you sure you want to do this? <span>This action is not reversible</span><span> <button onClick="window.location='<?php echo base_url('admin/publicusers/delete/'.$i); ?>'" class="link-btn grey">Yes</button> <button onClick="$('#<?php echo $i; ?>').hide();" class="link-btn grey">No</button></span></p>
  </div>
</div>
</td>
</tr>
<?php  } ?>
</table>
</div>
</div>	<!-- end table area --> 
</div>	<!-- end right contents -->
</div>	
