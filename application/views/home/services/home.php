
<div id="page-body">
<div class="container">

<h1 class="page-title">Services</h1>

<div class="content-inner">
<div class="row">
<div class="col-sm-6 services-post">
<?php echo $peptide_detail_image['data']; ?>
<!--<img src="<?php echo base_url('images/home'); ?>/services-img1.jpg" alt="" class="img-responsive img-border">-->
<h2><?php echo strip_tags($peptide_detail['title']); ?></h2>
<p><?php echo substr($peptide_detail['data'],0,500); ?></p>
<p><a href="<?php echo base_url('services/view/peptide'); ?>">View more</a></p>
</div>
<!--/ -->

<div class="col-sm-6 services-post">
<?php echo $synth_detail_image['data']; ?>
<h2><?php echo strip_tags($synth_detail['title']); ?></h2>
<p><?php echo strip_tags(substr($synth_detail['data'],0,500)); ?></p>
<p><a href="<?php echo base_url('services/view/custom'); ?>">View more</a></p>
</div>
<!--/ -->


</div>
</div>

<!-- end content -->

</div>
</div>
