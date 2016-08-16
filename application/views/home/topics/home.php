
<div id="page-body">
<div class="container">

<h1 class="page-title clearfix">Topics</h1>

<div class="content-inner">

<div class="row">
<?php $i=1; foreach($catlist as $row) { ?>
<div class="col-sm-4 topic-post" <?php  if($i==4 || $i==7 || $i==10 || $i==13 || $i==16) {?> style="clear:both" <?php } ?>>
<div class="topic-title">

<h4><img src="<?php echo base_url('uploads/icons'); ?>/<?php echo $row['icon']; ?>" alt=""><?php echo $row['title']; ?></h4>
</div>
<p><?php echo $row['detail']; ?></p>
<p><a href="<?php echo base_url('topics/view/'.$row['cat_id']); ?>">View more</a></p>
</div>
<!--/ -->
<?php $i++; } ?>




</div>
<!--/row -->

<div class="row">

<!--/ -->


<!--/ -->


<!--/ -->

</div>

<!--/row -->


</div>

<!-- end content -->

</div>
</div>
