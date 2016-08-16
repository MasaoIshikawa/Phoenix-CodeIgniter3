<script>
$(document).ready(function() {
    $('#video_list').dataTable( {
        "paging":   false,
		"info":     false,
		"searching":     false,
    } );
} );
</script>
<div id="page-body">
<div class="container">
<h1>Previous Support Requests</h1>

<div class="account-tabs">
<?php $this->load->view('home/myaccount/tabs'); ?>
</div>	<!-- end account tabs -->

<div class="table-responsive borderless-table">
<table id="video_list" class="table">
<thead>
<tr>
<th> <a href="javascript:void(0)">Request Name</a></th>
<th><a href="javascript:void(0)">Date</a></th>
<th><a href="javascript:void(0)">Status</a></th>
<th class="text-center">Actions</th>
</tr>
</thead>
<tbody>
<?php foreach($requests as $row) { ?>


<tr>
<td><?php echo $row['request_name'] ?></td>
<td><?php echo $row['date'] ?></td>
<td><?php  if($row['isread']==0) echo 'Pending'; else echo 'Approved' ?></td>
<td class="text-center">
<div class="inline-action"><a href="<?php echo site_url('myaccount/contact_support/view_request_detail/'.$row['contact_id']) ?>" title="Edit"><img src="<?php echo base_url() ?>images/home/view-icon.png" alt="View"></a></div>

<div class="inline-action"><a href="<?php echo site_url('myaccount/contact_support/delete_request/'.$row['contact_id']) ?>" title="remove"><img src="<?php echo base_url() ?>images/home/remove-icon.png" alt="remove"></a>

</div>
</td>
</tr>

<?php } ?>
</tbody></table>
</div>	<!-- end table container -->
</div>
</div>
