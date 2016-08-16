
<div id="page-body">
<div class="container">
<h1>My Shopping Cart</h1>
<form method="post" action="<?php echo base_url('cart/updatecart') ?>">
<div class="table-responsive borderless-table">



<table class="table table-striped">
<tr style="background-color:transparent">
<th>Catalog#</th>
<th>Product Name</th>
<th style="padding-right:0px !important;">Standard Size</th>
<th class="text-center">Qty</th>
<th class="text-center">Price</th>
<th class="text-center">Remove</th>
</tr>

<?php foreach ($this->cart->contents() as $items) { ?>

<tr>
<td><?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value) {
	if($option_name=='catalog') { echo $option_value; }
	 } ?></td>
<td><?php echo $items['name']; ?></td>
<td><?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value) {
	if($option_name=='size') { echo $option_value; }
	 } ?></td>
<td class="text-center">
<input name="rowid[]" value="<?php echo $items['rowid'] ?>" type="hidden">
<input name="qty[]" style="width: 35px;
text-align: center;" value="<?php echo $items['qty'] ?>" type="text"></td>
<td class="text-center">$<?php echo $items['subtotal']; ?></td>
<td class="text-center"><input name="remove[]" value="<?php echo $items['rowid'] ?>" type="checkbox"></td>
</tr>
<?php } ?>
</table>
</div>	<!-- end table container -->
<div class="total">Total: $<?php echo $this->cart->total(); ?></div>
<div class="text-right cart-actions">
<button name="" type="submit" class="btn grey">Update</button>

<a href="<?php echo base_url('products') ?>" style="width: 200px !important;"  class="btn grey">Continue Shopping</a>
<button name="" onClick="$('#checkout-confirm').show();" type="button" class="btn orange">Check Out</button>
</div>
</form>
</div>
</div>
<!-- link example -->
<a href="https://phoneixtest.foxycart.com/cart?name=Cool%20Example&price=10&color=red&code=sku123">Add a red Cool Example</a>
<!-- form example -->
<form action="https://phoneixtest.foxycart.com/cart" method="post" accept-charset="utf-8">
<input type="hidden" name="name" value="Cool Example" />
<input type="hidden" name="price" value="10" />
<input type="hidden" name="code" value="sku123" />
<label class="label_left">Size</label>
<select name="size">
    <option value="small">Small</option>
    <option value="medium">Medium</option>
    <option value="large">Large</option>
</select>
<input type="submit" value="Add a Cool Example" class="submit" />
</form>
<div id="checkout-confirm" class="popover-cont" style="display:none;" >
<div class="popover-overlay"></div>
<div class="xs-popup">
<a href="javascript:void(0); window.location='" onClick="$('#checkout-confirm').hide();" class="xs-close"><img alt=" " src="<?php echo base_url('images/home'); ?>/close.gif"></a>
<p class="text-center"><?php echo $checkout_confirm['data']; ?></p>
</div>
</div>	

