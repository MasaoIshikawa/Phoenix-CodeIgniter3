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
<h1 class="pull-left">Species Controller</h1>
<a href="javascript:void(0);" onClick="$('#addform').show();" class="link-btn green pull-right">Add New</a>
<a href="<?php echo base_url('admin/products') ?>"  class="link-btn green pull-right">Go back</a>
</div>	<!--/page title -->


<div class="table-content">
<div class="table-responsive">


<table id="video_list" class="topictable">

<thead>
<tr>
<th style="width:40%;"><a href="javascript:void(0)">Full name</a></th>
<th style="width:30%;"><a href="javascript:void(0)">Three letters</a></th>
<th style="width:25%">One letter</th>
<th class="text-center" style="width:5%">Actions</th>
</tr>
<thead>
<tbody>
<tr id="addform" style="display:none;">

        
<form id="catform" method="post" action="<?php echo site_url('admin/products/save_sequence')?>"  > 

<td><input  name="title" id="tit" class="form-control"></td>

<td>
<input type="text" name="three_letters" value="" class="form-control">
</td>
<td>
<input type="text" name="one_letter" value="" class="form-control">
</td>
<td class="actions text-center">
<div class="action-pops"><a href="javascript:void(0)" onclick="if($('#tit').val()!='' && $('#det').val()!='') {
	$('#catform').submit(); } else { alert('first fill the data');}" title="Save"><img src="<?php echo base_url('images/admin'); ?>/icon-save.png" alt="Save"></a></div>
<div class="action-pops"><a href="javascript:void(0);" onClick="$('#addform').hide();" title="remove"><img src="<?php echo base_url('images/admin'); ?>/remove-icon.png" alt="remove"></a></div>
</td>
</form>
</tr>

<?php foreach($species as $cat) { ?>

<tr id="edit_form_<?php echo $cat['seq_id']; ?>" style="display:none;">

<form  id="catform_<?php echo $cat['seq_id']; ?>" action="<?php echo site_url('admin/products/update_sequence')?>" method="post"> 
<td><input type="text" name="title" value="<?php echo $cat['full_name']; ?>" class="form-control">
<input type="hidden" name="seq_id" value="<?php echo $cat['seq_id']; ?>" class="form-control" style="width: 70%">
</td>
<td>
<input type="text" name="three_letters" value="<?php echo $cat['three_letters']; ?>" class="form-control">
</td>
<td>
<input type="text" name="one_letter" value="<?php echo $cat['one_letter']; ?>" class="form-control">
</td>



<td class="actions text-center">
<div class="action-pops"><a href="javascript:void(0)" onclick="$('#catform_<?php echo $cat['seq_id']; ?>').submit();" title="Save"><img src="<?php echo base_url('images/admin'); ?>/icon-save.png" alt="Save"></a></div>
<div class="action-pops"><a href="javascript:void(0);" onClick="$('#edit_form_<?php echo $cat['seq_id']; ?>').hide();" title="remove"><img src="<?php echo base_url('images/admin'); ?>/remove-icon.png" alt="remove"></a></div>
</td>
</form>
</tr>
<tr>
<td><?php echo $cat['full_name']; ?></td>
<td><?php echo $cat['three_letters']; ?></td>

<td><?php echo $cat['one_letter']; ?></td>

<td class="actions text-center">
<div class="action-pops"><a href="javascript:void(0);" onclick="$('#edit_form_<?php echo $cat['seq_id']; ?>').show();" title="edit"><img src="<?php echo base_url('images/admin'); ?>/edit-icon.png" alt="edit"></a></div>
<div class="action-pops">
<a href="javascript:void(0);" onClick="$('#f<?php echo $cat['seq_id']; ?>').show();" title="remove">
<img src="<?php echo base_url('images/admin'); ?>/remove-icon.png" alt="remove"></a>
  <div id="f<?php echo $cat['seq_id']; ?>" class="inline-popup" style="display:none;">
                <p>Are you sure you want to do this? <span>This action is not reversible</span><span> <button onClick="window.location='<?php echo base_url('admin/products/delete_sequence/'.$cat['seq_id']); ?>'" class="link-btn grey">Yes</button> <button onClick="$('#f<?php echo $cat['seq_id']; ?>').hide();" class="link-btn grey">No</button></span></p>
  
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
