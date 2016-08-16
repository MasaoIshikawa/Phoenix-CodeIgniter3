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

<h1>Products</h1>

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
<?php if(!empty($serchdata)) { foreach($serchdata['product'] as $row) { ?>
<?php //$price = number_format($row['price'], 4, '.', '');
 $pricestring= str_replace(",", "", $row['price']);
 $price=str_replace(".0000","",$pricestring);
 ?>
 
<tr>
<td><a href="<?php echo base_url('products/view/'.$serchdata['category'][$row['p_id']]['slug'].'/'.$row['catalog']); ?>" ><?php echo $row['catalog']; ?></a></td>
<td><a href="<?php echo base_url('products/view/'.$serchdata['category'][$row['p_id']]['slug'].'/'.$row['catalog']); ?>" > <?php if(!empty($row['prefix'])) {echo $row['prefix']; } echo $row['product_name']; ?> </a></td>
<td><a href="<?php echo base_url('products/view/'.$serchdata['category'][$row['p_id']]['slug'].'/'.$row['catalog']); ?>" ><?php echo $row['standard_size']; ?></a></td>
<td><a href="<?php echo base_url('products/view/'.$serchdata['category'][$row['p_id']]['slug'].'/'.$row['catalog']); ?>" >$<?php echo $price; ?></a></td>
<td class="text-center">

<form method="post" action="https://phoenixpeptide.foxycart.com/cart">
<input type="hidden" name="id" value="<?php echo $row['p_id']; ?>" />
<input type="hidden" name="name" value="<?php echo $row['product_name']; ?>" />
<input type="hidden" name="category" value="<?php echo $serchdata['category'][$row['p_id']]['slug']; ?>" />
<input type="hidden" name="quantity" value="1" />
<input type="hidden" name="price" value="<?php echo $price;   ?>" />
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
<?php }

}
?>
</form>
</td>
</tr>
<?php }} else  { ?>
<tr><td></td><td></td><td> Nothing match your search</td><td></td><td></td></tr> <?php } ?>
</tbody>
</table>
</div>	<!-- end table container -->
</div>
</div>
