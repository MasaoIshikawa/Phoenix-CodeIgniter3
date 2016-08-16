
<div id="page-body" class="clearfix">
<?php $this->load->view('admin/left-menu'); ?>	<!-- end left menu -->

<div id="right-contents">
<!--page title -->
<div class="page-title clearfix">
<h1 class="pull-left">Admin Content and META Controller</h1>
</div>	<!--/page title -->

<div class="table-content">
<div class="table-responsive">
<table>
<tr>
<th><a href="#">Title</a></th>
<th style="width: 65%;"><a href="#">Content</a></th>
<th class="text-center">Actions</th>
</tr>
<?php foreach($contents as $content){ ?>
<tr>
<td><?php  echo $content['name'] ?></td>
<td><?php if($content['type']=='meta') echo $content['description']; else echo $content['data'] ?></td>
<td class="actions text-center">
<div class="action-pops"><a href="<?php echo base_url('admin/content/edit/'.$content['content_id']); ?>" title="Edit"><img src="<?php echo base_url('images/admin'); ?>/edit-icon.png" alt="Edit"></a></div>
</td>
</tr>

<?php  } ?>

</table>
</div>
</div>	<!-- end table area --> 
</div>	<!-- end right contents -->
</div>	
