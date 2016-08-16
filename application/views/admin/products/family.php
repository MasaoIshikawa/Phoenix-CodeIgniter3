<script>

$(document).ready(function() {
    $('#video_list').dataTable( {
        "paging":   false,
		"info":     false,
		"searching":     false,
    } );
} );
</script>

<div id="page-body" class="clearfix">
<?php $this->load->view('admin/left-menu'); ?>	<!-- end left menu -->

<div id="right-contents">
<!--page title -->
<div class="page-title clearfix">
<h1 class="pull-left">Family Controller</h1>
<a href="javascript:void(0);" onClick="$('#addform').show();" class="link-btn green pull-right">Add New</a>
<a href="<?php echo base_url('admin/products') ?>"  class="link-btn green pull-right">Go back</a>
</div>	<!--/page title -->


<div class="table-content">
<div class="table-responsive">


<table id="video_list" class="topictable">

<thead>
<tr>
<th style="width:20%;"><a href="javascript:void(0)">Title</a></th>
<th class="text-center" style="width:5%">Actions</th>
</tr>
<thead>
<tbody>
<tr id="addform" style="display:none;">

        
<form id="catform" method="post" action="<?php echo site_url('admin/products/save_family')?>"  > 

<td><input  name="title" id="tit" class="form-control"></td>


<td class="actions text-center">
<div class="action-pops"><a href="javascript:void(0)" onclick="if($('#tit').val()!='' && $('#det').val()!='') {
	$('#catform').submit(); } else { alert('first fill the data');}" title="Save"><img src="<?php echo base_url('images/admin'); ?>/icon-save.png" alt="Save"></a></div>
<div class="action-pops"><a href="javascript:void(0);" onClick="$('#addform').hide();" title="remove"><img src="<?php echo base_url('images/admin'); ?>/remove-icon.png" alt="remove"></a></div>
</td>
</form>
</tr>

<?php foreach($species as $cat) { ?>

<tr id="edit_form_<?php echo $cat['family_id']; ?>" style="display:none;">

<form  id="catform_<?php echo $cat['family_id']; ?>" action="<?php echo site_url('admin/products/update_family')?>" method="post"> 
<td><input type="text" name="title" value="<?php echo $cat['name']; ?>" class="form-control">
<input type="hidden" name="family_id" value="<?php echo $cat['family_id']; ?>" class="form-control" style="width: 70%">
</td>


<td class="actions text-center">
<div class="action-pops"><a href="javascript:void(0)" onclick="$('#catform_<?php echo $cat['family_id']; ?>').submit();" title="Save"><img src="<?php echo base_url('images/admin'); ?>/icon-save.png" alt="Save"></a></div>
<div class="action-pops"><a href="javascript:void(0);" onClick="$('#edit_form_<?php echo $cat['family_id']; ?>').hide();" title="remove"><img src="<?php echo base_url('images/admin'); ?>/remove-icon.png" alt="remove"></a></div>
</td>
</form>
</tr>
<tr>
<td><?php echo $cat['name']; ?></td>

<td class="actions text-center">
<div class="action-pops"><a href="javascript:void(0);" onclick="$('#edit_form_<?php echo $cat['family_id']; ?>').show();" title="edit"><img src="<?php echo base_url('images/admin'); ?>/edit-icon.png" alt="edit"></a></div>
<div class="action-pops">
<a href="javascript:void(0);" onClick="$('#f<?php echo $cat['family_id']; ?>').show();" title="remove">
<img src="<?php echo base_url('images/admin'); ?>/remove-icon.png" alt="remove"></a>
  <div id="f<?php echo $cat['family_id']; ?>" class="inline-popup" style="display:none;">
                <p>Are you sure you want to do this? <span>This action is not reversible</span><span> <button onClick="window.location='<?php echo base_url('admin/products/delete_family/'.$cat['family_id']); ?>'" class="link-btn grey">Yes</button> <button onClick="$('#f<?php echo $cat['family_id']; ?>').hide();" class="link-btn grey">No</button></span></p>
  
  </div>
  
  </div>
</td>
</tr>
<?php } ?>

</tbody>

</table>
</div>
</div>	<!-- end table area --> 
</div>	<!-- end right contents -->
</div>
