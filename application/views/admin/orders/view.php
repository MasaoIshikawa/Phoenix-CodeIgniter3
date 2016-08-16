<div id="page-body" class="clearfix">
<?php $this->load->view('admin/left-menu'); ?>	<!-- end left menu -->
	<!-- end left menu -->

<div id="right-contents" class="edit-order view-order">

<!--page title -->
<div class="page-title clearfix">
<div class="row">
<h1 class="col-sm-6">Edit Order# <?php echo $orders['order_id']; ?> Detail</h1>
<?php /*?><div  class="col-sm-6"><button class="link-btn blue" onclick="window.location='<?php echo base_url('admin/orders/edit/'.$orders['order_id']) ?>'" type="submit">Edit</button> <button class="link-btn grey" type="submit">Remove</button></div><?php */?>
</div>
</div>	<!--/page title -->

<div class="row">
<div class="col-sm-6">
<div class="order-section">
<dl class="dl-horizontal">
<dt>User Name:</dt>
<dd><?php echo $orders['user_name']; ?></dd>
<dt>Contact Info:</dt>
<dd><?php echo $orders['email_address']; ?></dd>
<dt>Sale Date:</dt>
<dd><?php echo $orders['transaction_date']; ?></dd>
<dt>Status:</dt>
<dd><?php echo $orders['status']; ?></dd>
</dl>
</div>
</div>
<div class="col-sm-6">
<dl class="dl-horizontal">
<dt>Product Price:</dt>
<dd>$<?php echo $orders['product_total']; ?></dd>
<dt>Tax:</dt>
<dd>$<?php echo $orders['tax_total']; ?></dd>
<dt>Shipping Cost:</dt>
<dd>$<?php echo $orders['shipping_total']; ?></dd>
<dt>Payment:</dt>
<dd>$<?php echo $orders['order_total']; ?></dd>
<dt>Tracking Number:</dt>
<dd><?php echo $orders['transaction_id']; ?></dd>
</dl>
</div>
</div>

<div class="row">
<h2>Product Detail</h2>
<?php foreach($order_detail as $detail) { ?>
<div class="col-sm-6">
<div class="order-section">
<dl class="dl-horizontal">
<dt>Product Name:</dt>
<dd><?php echo $detail['product_name']; ?></dd>
<dt>Catalog:</dt>
<dd><?php echo $detail['catalog']; ?></dd>
<dt>Price:</dt>
<dd>$<?php echo $detail['price']; ?></dd>
<dt>Quantity:</dt>
<dd><?php echo $detail['quantity']; ?></dd>
</dl>
</div>
</div>
<?php } ?>
</div>


<div class="row">
<div class="col-sm-6">
<div class="order-section">
<h2>Shipping Address</h2>
<dl class="dl-horizontal">
<dt>Street Name:</dt>
<dd><?php echo $orders['shipping_address']; ?></dd>
<dt>City:</dt>
<dd><?php echo $orders['shipping_city']; ?></dd>
<dt>State:</dt>
<dd><?php echo $orders['shipping_state']; ?></dd>
<dt>Zip Code:</dt>
<dd><?php echo $orders['shipping_postalcode']; ?></dd>
<dt>Country:</dt>
<dd><?php echo $orders['shipping_country']; ?></dd>
</dl>
</div>
</div>
<div class="col-sm-6">
<h2>Billing  Address</h2>
<dl class="dl-horizontal">
<dt>Street Name:</dt>
<dd><?php echo $orders['address']; ?></dd>
<dt>City:</dt>
<dd><?php echo $orders['city']; ?></dd>
<dt>State:</dt>
<dd><?php echo $orders['state']; ?></dd>
<dt>Zip Code:</dt>
<dd><?php echo $orders['postalcode']; ?></dd>
<dt>Country:</dt>
<dd><?php echo $orders['country']; ?></dd>
</dl>
</div>
</div>

</div>	<!-- end right contents -->
</div>	<!--/page body -->
