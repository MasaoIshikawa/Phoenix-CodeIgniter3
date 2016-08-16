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
<h1 class="pull-left">Products Controller</h1>
<div class="pull-right">
<form method="post" action="<?php echo base_url('admin/products/') ?>" id="pform">
     
<div class="input-group search-area">
	 <input type="text" name="searchfld" class="form-control">
     <input type="hidden" name="checksearch" class="form-control" value="1">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" onclick="$('#pform').submit();">Search</button>
       
      </span>
     
    </div>
    </form>
    <a style="margin-top:20px;" class="link-btn green pull-right" href="<?php echo base_url('admin/products/addproducts') ?>" title="Add">Add Product</a>
     <a style="margin-top:20px;" class="link-btn green pull-right" href="<?php echo base_url('admin/products/species') ?>" title="Add">Species</a>
      <a style="margin-top:20px;" class="link-btn green pull-right" href="<?php echo base_url('admin/products/family') ?>" title="Add">Family</a>
      <a style="margin-top:20px;" class="link-btn green pull-right" href="<?php echo base_url('admin/products/sequence') ?>" title="Add">Sequence</a>
</div>
</div>	<!--/page title -->



<div class="table-content view-product">
<div class="table-responsive">
<table id="video_list">
<thead>
<th>Product Name</th>
<th>Catalog#</th>
<th class="text-right" style="width:105px !important">Actions</th>
</thead>
<tbody>
<?php foreach($productslist as $products) { ?>
<tr>
<td><?php echo $products['prefix']; echo $products['product_name']; ?></td>
<td><?php echo $products['catalog']; ?></td>

<td class="actions text-right">
<div class="action-pops"><a href="<?php echo base_url('admin/products/view/'.$products['p_id']); ?>" title="View"><img src="<?php echo base_url('images/admin'); ?>/view-icon.png" alt="View"></a></div>
<div class="action-pops"><a href="<?php echo base_url('admin/products/edit/'.$products['p_id']); ?>" title="edit"><img src="<?php echo base_url('images/admin'); ?>/edit-icon.png" alt="edit"></a></div>
<div class="action-pops">
<a href="javascript:void(0);" onClick="$('#f<?php echo $products['p_id']; ?>').show();" title="remove">
<img src="<?php echo base_url('images/admin'); ?>/remove-icon.png" alt="remove"></a>
  <div id="f<?php echo $products['p_id']; ?>" class="inline-popup" style="display:none;">
                <p>Are you sure you want to do this? <span>This action is not reversible</span><span> <button onClick="window.location='<?php echo base_url('admin/products/delete_prodcuts/'.$products['p_id']); ?>'" class="link-btn grey">Yes</button> <button onClick="$('#f<?php echo $products['p_id']; ?>').hide();" class="link-btn grey">No</button></span></p>
  
  </div>
  
  </div>
</td>
</tr>
<?php } ?>
</tbody>


</table>

<?php   echo $this->pagination->create_links(); ?>
</div>
</div>	<!-- end table area --> 
</div>	<!-- end right contents -->
</div>	
