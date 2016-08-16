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
<h1 class="pull-left">Topics Categories Controller</h1>
<a href="javascript:void(0);" onClick="$('#addform').show();" class="link-btn green pull-right">Add New</a>
<a href="<?php echo base_url('admin/topics/topicslist') ?>"  class="link-btn green pull-right">Topics Controller</a>
</div>	<!--/page title -->
<form method="post" id="file_upload" style="display:none;">
           
            <input type="file" accept="image/*" class="upload" name="file" style="display:none" >
        
        </form>
        <form method="post" id="edit_file_upload" style="display:none;">
           
            <input type="file" accept="image/*" class="upload_edit" name="file" style="display:none" >
        
        </form>
<div class="table-content">
<div class="table-responsive">


<table id="video_list" class="topictable">

<thead>
<tr>
<th style="width:5%;"><a href="javascript:void(0)">Category</a></th>
<th style="width:50%;"><a href="javascript:void(0)">Description</a></th>
<th style="width:10%;"><a href="javascript:void(0)">Icon</a></th>
<th style="width:18%;"><a href="javascript:void(0)">Ceated By</a></th>
<th style="width:10%;"><a href="javascript:void(0)">Priority</a></th>
<th class="text-center" style="width:5%">Actions</th>
</tr>
<thead>
<tbody>
<tr id="addform" style="display:none;">

        
<form action="<?php echo site_url('admin/topics/save_categoy')?>" method="post" id="catform"> 

<td><input type="text" name="title" class="form-control"  placeholder="Title"></td>

<td>

<textarea name="detail" cols="30" rows="5" class="form-control"></textarea></td>

<td><input  type="hidden" class="icon"  value=""  id="reci_image" name="icon">
<a href="javascript:void(0)" class="upload_img">
<img id="profileim" style="width:35px; height:28px;" src="<?php echo base_url();?>images/admin/upload.png" /></a>

</td>
<td>
<?php echo $userdata['first_name'].' '.$userdata['last_name']; ?>
</td>

<td><input name="status" type="text" class="form-control" ></td>

<td class="actions text-center">
<div class="action-pops"><a href="javascript:void(0)" onclick="$('#catform').submit()" title="Save"><img src="<?php echo base_url('images/admin'); ?>/icon-save.png" alt="Save"></a></div>
<div class="action-pops"><a href="javascript:void(0);" onClick="$('#addform').hide();" title="remove"><img src="<?php echo base_url('images/admin'); ?>/remove-icon.png" alt="remove"></a></div>
</td>
</form>
</tr>

<?php foreach($catlist as $cat) { ?>

<tr id="edit_form_<?php echo $cat['cat_id']; ?>" style="display:none;">

<form action="<?php echo site_url('admin/topics/update_categoy')?>" method="post" id="catform_<?php echo $cat['cat_id']; ?>"> 
<td><input type="text" name="title" value="<?php echo $cat['title']; ?>" class="form-control">
<input type="hidden" name="cat_id" value="<?php echo $cat['cat_id']; ?>" class="form-control" style="width: 70%">
</td>
<td>
<textarea name="detail" cols="30" rows="5" class="form-control"><?php echo $cat['detail']; ?></textarea>
</td>
<td><input  type="hidden" class="icon_<?php echo $cat['cat_id']; ?>"  value="<?php echo $cat['icon'] ?>"  name="icon">
<a href="javascript:void(0)" class="upload_img_edit" id="<?php echo $cat['cat_id'] ?>">
<img class="profileim_<?php echo $cat['cat_id']; ?>" style="width:35px; height:28px;" src="<?php echo base_url();?>images/admin/upload.png" /></a>

</td>
<td>
<?php echo $cat['first_name'].' '.$cat['last_name']; ?>
</td>
<td><input name="status" type="text" value="<?php echo  $cat['status_topic']; ?>" class="form-control" ></td>

<td class="actions text-center">
<div class="action-pops"><a href="javascript:void(0)" onclick="$('#catform_<?php echo $cat['cat_id']; ?>').submit()" title="Save"><img src="<?php echo base_url('images/admin'); ?>/icon-save.png" alt="Save"></a></div>
<div class="action-pops"><a href="javascript:void(0);" onClick="$('#edit_form_<?php echo $cat['cat_id']; ?>').hide();" title="remove"><img src="<?php echo base_url('images/admin'); ?>/remove-icon.png" alt="remove"></a></div>
</td>
</form>
</tr>
<tr>
<td><?php echo $cat['title']; ?></td>
<td><?php echo $cat['detail']; ?></td>
<td><img style="width:35px; height:28px;" src="<?php echo base_url();?>uploads/icons/<?php echo $cat['icon']; ?>" /></td>
<td><?php echo $cat['first_name'].' '.$cat['last_name']; ?></td>
<td><?php  echo $cat['status_topic']; ?></td>
<td class="actions text-center">
<div class="action-pops"><a href="#" onclick="$('#edit_form_<?php echo $cat['cat_id']; ?>').show();" title="edit"><img src="<?php echo base_url('images/admin'); ?>/edit-icon.png" alt="edit"></a></div>
<div class="action-pops">
<a href="javascript:void(0);" onClick="$('#f<?php echo $cat['cat_id']; ?>').show();" title="remove">
<img src="<?php echo base_url('images/admin'); ?>/remove-icon.png" alt="remove"></a>
  <div id="f<?php echo $cat['cat_id']; ?>" class="inline-popup" style="display:none;">
                <p>Are you sure you want to do this? <span>This action is not reversible</span><span> <button onClick="window.location='<?php echo base_url('admin/topics/delete_cat/'.$cat['cat_id']); ?>'" class="link-btn grey">Yes</button> <button onClick="$('#f<?php echo $cat['cat_id']; ?>').hide();" class="link-btn grey">No</button></span></p>
  
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

