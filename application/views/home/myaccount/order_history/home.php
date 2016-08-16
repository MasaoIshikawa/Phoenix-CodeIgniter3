
<div id="page-body">
<div class="container">
<h1>My Order Hitory</h1>

<div class="account-tabs">
<?php $this->load->view('home/myaccount/tabs'); ?>

</div>	<!-- end account tabs -->

<div class="table-responsive borderless-table">
<table class="table">
<tr>
<th>Transaction ID</th>
<th>Transaction Date</th>
<th>Status</th>
<th></th>
</tr>

<?php foreach($orders as $row) { ?>
<tr>
<td><?php echo $row['transaction_id'] ?></td>
<td><?php echo $row['transaction_date'] ?></td>
<td><?php echo $row['status'] ?></td>
<td><a href="<?php echo base_url('myaccount/order_history/view/'.$row['order_id']);?>" title="View"><img src="<?php echo base_url('images/home');?>/view-icon.png" alt="view"></a></td>
</tr>

<?php } ?>
</table>
</div>	<!-- end table container -->
</div>
</div>	
