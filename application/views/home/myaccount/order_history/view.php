<div id="page-body">
<div class="container">
<h1>Transaction Detail</h1>

<div class="account-tabs">
<?php $this->load->view('home/myaccount/tabs'); ?>
</div>	<!-- end account tabs -->

<div class="row view-transaction">
<div class="col-sm-6">
<p class="clearfix">
<label>Product Name:</label>
<span><?php foreach($order_detail as $detail) { echo $detail['product_name'].', '; } ?></span>
</p>
<?php foreach($order as $row) { ?>
<p class="clearfix">
<label>Sale Date:</label>
<span><?php echo $row['transaction_date']; ?></span>
</p>

<p class="clearfix">
<label>Status:</label>
<span><?php echo $row['status']; ?></span>
</p>


<p class="clearfix">
<label>Phone Number:</label>
<span><?php echo $row['phone_number']; ?></span>
</p>
</div>	<!-- end col -->

<div class="col-sm-6">
<p class="clearfix">
<label>Product Total:</label>
<span>$<?php echo $row['product_total']; ?></span>
</p>

<p class="clearfix">
<label>Tax:</label>
<span>$<?php echo $row['tax_total']; ?></span>
</p>
<p class="clearfix">
<label>Shipping Cost:</label>
<span>$<?php echo $row['shipping_total']; ?></span>
</p>
<p class="clearfix">
<label>Payment:</label>
<span>$<?php echo $row['order_total']; ?></span>
</p>



<p class="clearfix">
<label>Tracking Number:</label>
<span><?php echo $row['transaction_id']; ?></span>
</p>
</div>	<!-- end col -->
</div>
<hr>

<div class="row view-transaction">
<div class="col-sm-6">
<p class="clearfix">
<label><strong>Shipping Address:</strong></label>
<span><?php echo $row['shipping_address']; ?> </span>
</p>

<p class="clearfix">
<label>City:</label>
<span><?php echo $row['shipping_city']; ?></span>
</p>

<p class="clearfix">
<label>State:</label>
<span><?php echo $row['shipping_state']; ?></span>
</p>

<p class="clearfix">
<label>Country:</label>
<span><?php echo $row['shipping_country']; ?></span>
</p>

<p class="clearfix">
<label>Postal Code:</label>
<span><?php echo $row['shipping_postalcode']; ?></span>
</p>
</div>	<!-- end col -->

<div class="col-sm-6">
<p class="clearfix">
<label><strong>Billing Address:</strong></label>
<span><?php echo $row['address']; ?></span>
</p>

<p class="clearfix">
<label>City:</label>
<span><?php echo $row['city']; ?></span>
</p>

<p class="clearfix">
<label>State:</label>
<span><?php echo $row['state']; ?></span>
</p>

<p class="clearfix">
<label>Country:</label>
<span><?php echo $row['country']; ?></span>
</p>

<p class="clearfix">
<label>Postal Code:</label>
<span><?php echo $row['postalcode']; ?></span>
</p>
<?php }?>
</div>	<!-- end col -->
</div>

</div>
</div>
