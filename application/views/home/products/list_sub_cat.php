<?php iconv_set_encoding('internal_encoding', 'UTF-8');
mb_internal_encoding('UTF-8'); ?>
<script>
$(document).ready(function() {
	$('#catsearch').change(function() {
		var selectvalue=$(this).val();
		window.location="<?php echo base_url('products') ?>/"+selectvalue;
		
		});
		$('#subcatsearch').change(function() {
		var selectvalue=$(this).val();
		window.location="<?php echo base_url('products/'.$catid) ?>/"+selectvalue;
		
		});
	
	});
</script>
<script>

$(document).ready(function() {
    $('#video_list').dataTable( {
        "paging":   false,
		"info":     false,
		//"searching":     false,
    } );
} );
</script>

<div id="page-body">
<div class="container">
<form class="filter-row clearfix">
<h1>Products</h1>
<div class="pull-left" style="width:135px;">
<select id="catsearch" name="cat" class="form-control">
<?php foreach($catList as $cat) { ?>
<option <?php if($cat['slug']==$catid) echo 'selected=selected'; ?> value="<?php echo $cat['slug']; ?>"><?php echo $cat['title']; ?></option>
<?php } ?>
</select>
</div>

<div class="pull-left" style="width:165px;">
<select name="" id="subcatsearch" class="form-control">
<option>Subcategory</option>
<?php foreach($subcatlist as $subcat) { ?>
<option <?php if($subcat['sub_slug']==$subcatdata['sub_slug']) echo 'selected=selected'; ?> value="<?php echo $subcat['sub_slug']; ?>"><?php echo $subcat['sub_title']; ?></option>
<?php } ?>
</select>


</div>
</form>
<div class="banner"><img src="<?php echo base_url('images/home'); ?>/category-banner.jpg" class="img-responsive" alt=" "></div>
<h3 style="font-weight:600"><?php echo $subcatdata['sub_title']; ?></h3>
<p><?php echo $subcatdata['sub_description']; ?></p>

<h1 style="padding-top:20px;">Products</h1>
<div class="table-responsive borderless-table">
<table class="table table-striped" id="video_list">
<thead>
<tr style="background-color:transparent">
<th>Catalog#</th>
<th>Product</th>
<th>Standard Size</th>
<th>Price</th>
<th class="text-center">Buy Now</th>
</tr>
</thead>
<tbody>
<?php  foreach($products as $row) { ?>
<?php //$price = number_format($row['price'], 4, '.', '');
 $pricestring= str_replace(",", "", $row['price']);
 $price=str_replace(".0000","",$pricestring);
 ?>
<tr>
<td><a href="<?php echo base_url('products/view/'.$catid.'/'.$row['catalog']); ?>" ><?php echo $row['catalog']; ?></a></td>
<td><a href="<?php echo base_url('products/view/'.$catid.'/'.$row['catalog']); ?>" > <?php if(!empty($row['prefix'])) {echo $row['prefix']; } echo $row['product_name']; ?> </a></td>
<td><a href="<?php echo base_url('products/view/'.$catid.'/'.$row['catalog']); ?>" ><?php echo $row['standard_size']; ?></a></td>
<td><a href="<?php echo base_url('products/view/'.$catid.'/'.$row['catalog']); ?>" >$<?php echo $price; ?></a></td>

<td class="text-center">
<form method="post" action="https://phoenixpeptide.foxycart.com/cart">
<input type="hidden" name="id" value="<?php echo $row['p_id']; ?>" />
<input type="hidden" name="name" value="<?php echo $row['product_name']; ?>" />
<input type="hidden" name="category" value="<?php echo $catid; ?>" />
<input type="hidden" name="quantity" value="1" />
<input type="hidden" name="price" value="<?php echo $price; ?>" />
<input type="hidden" name="catalog" value="<?php echo $row['catalog']; ?>" />
<input type="hidden" name="size" value="<?php echo $row['standard_size']; ?>" />
<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" />
<?php if($price=='0') { ?>
<button name="" onclick="window.location.href='<?php echo base_url('contact'); ?>'" type="button" class="btn orange">Contact Us</button>		
<?php }  else { ?>
<?php if($this->session->userdata('user_id')=='') { ?>
<button name="" onclick="$('#signin-pop').show(); window.scrollTo('20px', '30px');" type="button" class="btn orange">Order</button>			
			<?php }  else { ?>
<button name="" type="submit" class="btn orange">Order</button>
<?php 
} 

}
?>

</form>
</td>
</tr>
<?php } ?>

</tbody>
</table>
</div>	<!-- end table container -->
</div>
</div>
