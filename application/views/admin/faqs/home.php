<script>
$(document).ready(function() {
    $('#video_list').dataTable( {
        "paging":   false,
		"info":     false,
		"searching":     false,
    } );
} );
</script>
<script>

    $(document).ready(function(e) {

		$('.upload_img').click(function() {
        
		    $('.upload').click();
       
		});
		
			$('#file_upload').fileupload({
				
			url: '<?php echo base_url('admin/topics/addprofile_img'); ?>',
			dataType: 'json',
			done: function (e, data) {				
				$('#reci_image').val(data._response.result[1]);
				$('#profileim').attr("src", data._response.result[0]);
				
			}
		});
		var editimg;
		$('.upload_img_edit').click(function() {
        
			editimg=$(this).attr('id');
		    $('.upload_edit').click();
     
		});
		
			$('#edit_file_upload').fileupload({
				
			url: '<?php echo base_url('admin/topics/addprofile_img'); ?>',
			dataType: 'json',
			done: function (e, data) {				
				$('.icon_'+editimg).val(data._response.result[1]);
				$('.profileim_'+editimg).attr("src", data._response.result[0]);
				
			}
		});
		
	});
</script>
<div id="page-body" class="clearfix">
<?php $this->load->view('admin/left-menu'); ?>	<!-- end left menu -->

<div id="right-contents">
<!--page title -->
<div class="page-title clearfix">
<h1 class="pull-left">Faqs Topics Controller</h1>
<a href="javascript:void(0);" onClick="$('#addform').show();" class="link-btn green pull-right">Add New</a>
<a href="<?php echo base_url('admin/faqs/faqlist') ?>"  class="link-btn green pull-right">Faqs Controller</a>
</div>	<!--/page title -->

<div class="table-content">
<div class="table-responsive">


<table id="video_list" class="topictable">

<thead>
<tr>
<th><a href="javascript:void(0)"> Title</a></th>

<th class="text-center" style="width:5%">Actions</th>
</tr>
<thead>
<tbody>
<tr id="addform" style="display:none;">

        
<form action="<?php echo site_url('admin/faqs/save_categoy')?>" method="post" id="catform"> 

<td><input type="text" name="title" class="form-control"  placeholder="Title"></td>

<td class="actions text-center">
<div class="action-pops"><a href="javascript:void(0)" onclick="$('#catform').submit()" title="Save"><img src="<?php echo base_url('images/admin'); ?>/icon-save.png" alt="Save"></a></div>
<div class="action-pops"><a href="javascript:void(0);" onClick="$('#addform').hide();" title="remove"><img src="<?php echo base_url('images/admin'); ?>/remove-icon.png" alt="remove"></a></div>
</td>
</form>
</tr>

<?php foreach($catlist as $cat) { ?>

<tr id="edit_form_<?php echo $cat['id']; ?>" style="display:none;">

<form action="<?php echo site_url('admin/faqs/update_categoy')?>" method="post" id="catform_<?php echo $cat['id']; ?>"> 
<td><input type="text" name="title" value="<?php echo $cat['title']; ?>" class="form-control">
<input type="hidden" name="id" value="<?php echo $cat['id']; ?>" class="form-control" style="width: 70%">
</td>

<td class="actions text-center">
<div class="action-pops"><a href="javascript:void(0)" onclick="$('#catform_<?php echo $cat['id']; ?>').submit()" title="Save"><img src="<?php echo base_url('images/admin'); ?>/icon-save.png" alt="Save"></a></div>
<div class="action-pops"><a href="javascript:void(0);" onClick="$('#edit_form_<?php echo $cat['id']; ?>').hide();" title="remove"><img src="<?php echo base_url('images/admin'); ?>/remove-icon.png" alt="remove"></a></div>
</td>
</form>
</tr>
<tr>
<td><?php echo $cat['title']; ?></td>
<td class="actions text-center">
<div class="action-pops"><a href="#" onclick="$('#edit_form_<?php echo $cat['id']; ?>').show();" title="edit"><img src="<?php echo base_url('images/admin'); ?>/edit-icon.png" alt="edit"></a></div>
<div class="action-pops">
<a href="javascript:void(0);" onClick="$('#f<?php echo $cat['id']; ?>').show();" title="remove">
<img src="<?php echo base_url('images/admin'); ?>/remove-icon.png" alt="remove"></a>
  <div id="f<?php echo $cat['id']; ?>" class="inline-popup" style="display:none;">
                <p>Are you sure you want to do this? <span>This action is not reversible</span><span> <button onClick="window.location='<?php echo base_url('admin/faqs/delete_cat/'.$cat['id']); ?>'" class="link-btn grey">Yes</button> <button onClick="$('#f<?php echo $cat['id']; ?>').hide();" class="link-btn grey">No</button></span></p>
  
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

