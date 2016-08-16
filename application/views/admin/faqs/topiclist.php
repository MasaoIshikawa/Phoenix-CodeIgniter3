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
<h1 class="pull-left">Topics Controller</h1>
<a href="<?php echo base_url('admin/faqs/add') ?>"  class="link-btn green pull-right">Add New Topic Question</a>
</div>	<!--/page title -->

<div class="table-content">
<div class="table-responsive">


<table id="video_list" class="topictable">

<thead>
<tr>
<th style="width:15%;"><a href="javascript:void(0)">Topic</a></th>
<th style="width:15%;"><a href="javascript:void(0)">Question</a></th>
<th style="width:60%;"><a href="javascript:void(0)">Answer</a></th>
<th class="text-center" style="width:10%">Actions</th>
</tr>
<thead>
<tbody>
<?php foreach($topics as $topics) { ?>
<tr>
<td>
<?php echo $topics['title']; ?>
</td>

<td>
<?php echo $topics['question']; ?></a>
</td>
<td>
<?php echo $topics['answer']; ?></a>
</td>
<td class="actions text-center">
<div class="action-pops"><a href="<?php echo base_url('admin/faqs/edit/'.$topics['faq_id']) ?>" title="edit"><img src="<?php echo base_url('images/admin'); ?>/edit-icon.png" alt="edit"></a></div>
<div class="action-pops"><a href="javascript:void(0);" onClick="$('#<?php echo $topics['faq_id']; ?>').show();" title="remove"><img src="<?php echo base_url('images/admin'); ?>/remove-icon.png" alt="remove"></a>
  <div id="<?php echo $topics['faq_id']; ?>" class="inline-popup" style="display:none;">
                <p>Are you sure you want to do this? <span>This action is not reversible</span><span> <button onClick="window.location='<?php echo base_url('admin/faqs/delete_question/'.$topics['faq_id']); ?>'" class="link-btn grey">Yes</button> <button onClick="$('#<?php echo $topics['faq_id']; ?>').hide();" class="link-btn grey">No</button></span></p>
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

