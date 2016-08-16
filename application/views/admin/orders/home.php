  
<div id="page-body" class="clearfix">
<?php $this->load->view('admin/left-menu'); ?>	<!-- end left menu -->

<div id="right-contents">
<!--page title -->
<div class="page-title clearfix">
<h1 class="pull-left">Admin Orders Controller</h1>
<form method="post" action="<?php echo base_url('admin/orders/search'); ?>">
<div class="pull-right">
<div class="input-group">

      <input type="text" class="form-control"  name="searchorder" placeholder="Enter here to search">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Search</button>
        
      </span>
      
    </div>
</div>
</form>
</div>	<!--/page title -->

<div class="table-content">
<div class="table-responsive">
<table>
<tr>
<th>User Name</th>
<th>Tracking Number:</th>
<th>Sale Date</th>
<th>Status</th>
<th class="text-center">Actions</th>
</tr>
<?php foreach($orders as $row) { ?>
<tr id="edit_form_<?php echo $row['order_id']; ?>" style="display:none;">

<form action="<?php echo site_url('admin/orders/update/'.$row['order_id'])?>" method="post" id="catform_<?php echo $row['order_id']; ?>"> 
<td><?php echo $row['user_name'] ?></td>
<td><?php echo $row['transaction_id'] ?></td>
<td><?php echo $row['transaction_date'] ?></td>

<td><select name="status" class="form-control"><option value="Received" <?php if($row['status']=='Received') echo 'selected=selected'; ?>>Received</option>
<option value="Shipped"<?php if($row['status']=='Shipped') echo 'selected=selected'; ?>>Shipped</option>
<option value="Delivered"<?php if($row['status']=='Delivered') echo 'selected=selected'; ?>>Delivered</option></select></td>

<td class="actions text-center">
<div class="action-pops"><a href="javascript:void(0)" onclick="$('#catform_<?php echo $row['order_id']; ?>').submit()" title="Save"><img src="<?php echo base_url('images/admin'); ?>/icon-save.png" alt="Save"></a></div>
<div class="action-pops"><a href="javascript:void(0);" onClick="$('#edit_form_<?php echo $row['order_id']; ?>').hide();" title="remove"><img src="<?php echo base_url('images/admin'); ?>/remove-icon.png" alt="remove"></a></div>
</td>
</form>
</tr>
<tr>
<?php if($row['status']=='Received') { ?>
<td style="font-weight:bold;"><?php echo $row['user_name'] ?></td>
<td style="font-weight:bold;"><?php echo $row['transaction_id'] ?></td>
<td style="font-weight:bold;"><?php echo $row['transaction_date'] ?></td>
<td style="font-weight:bold;"><?php echo $row['status'] ?></td>
<?php }  else { ?>
<td><?php echo $row['user_name'] ?></td>
<td><?php echo $row['transaction_id'] ?></td>
<td><?php echo $row['transaction_date'] ?></td>
<td><?php echo $row['status'] ?></td>
<?php } ?>
<td class="actions text-center">
<div class="action-pops"><a href="<?php echo base_url('admin/orders/view/'.$row['order_id']) ?>" title="View"><img src="<?php echo base_url('images/admin'); ?>/view-icon.png" alt="View"></a></div>
<div class="action-pops"><a href="#" onclick="$('#edit_form_<?php echo $row['order_id']; ?>').show();" title="edit"><img src="<?php echo base_url('images/admin'); ?>/edit-icon.png" alt="edit"></a></div>
<div class="action-pops"><a href="javascript:void(0);" onClick="$('#<?php echo $row['order_id']; ?>').show();" title="remove"><img src="<?php echo base_url('images/admin'); ?>/remove-icon.png" alt="remove"></a>
  <div id="<?php echo $row['order_id']; ?>" class="inline-popup" style="display:none;">
                <p>Are you sure you want to do this? <span>This action is not reversible</span><span> <button onClick="window.location='<?php echo base_url('admin/orders/delete/'.$row['order_id']); ?>'" class="link-btn grey">Yes</button> <button onClick="$('#<?php echo $row['order_id']; ?>').hide();" class="link-btn grey">No</button></span></p>
  </div>
  </div>
</td>
</tr>
<?php } ?>
</table>
</div>
</div>	<!-- end table area --> 
</div>	<!-- end right contents -->
</div>
