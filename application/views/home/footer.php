
<footer>
<div class="container">

<div class="global-search">
<form method="post" action="<?php echo base_url('products/searchresult') ?>">
<input name="searchproduct" id="searchrecipe" type="text" class="form-control" placeholder="Search">
</form>
</div>	<!-- global search -->

<div class="clearfix">


<div class="footer-col">
<ul>
<li><a href="<?php echo base_url('support'); ?>">Technical Support</a></li>
<li><a href="<?php echo base_url('support/view/sample_preparation'); ?>">Sample Preparation</a></li>
<li><a href="<?php echo base_url('support/view/faqs'); ?>">FAQ</a></li>
<li><a href="<?php echo base_url('support/view/catalog'); ?>">Catalog Request</a></li>
<li><a href="<?php echo base_url('support/view/survey'); ?>">Customer Satisfaction</a></li>
</ul>
<?php /*?><ul>
<li><a href="<?php echo base_url('products'); ?>" style="font-size:22px !important; font-weight:bold;">Products</a></li>
<?php foreach($catList as $cat ) { ?>
<li><a href="<?php echo base_url('products/'.$cat['slug']); ?>"><?php echo $cat['title'] ?></a></li>

<?php } ?>
</ul><?php */?>
</div>	<!-- end col -->

<?php /*?><div class="footer-col">

<ul>
<li><a href="<?php echo base_url('topics'); ?>" style="font-size:22px !important; font-weight:bold;">Topics</a></li>
<?php foreach($topiclist as $topic ) { ?>
<li><a href="<?php echo base_url('topics/view/'.$topic['cat_id']); ?>"><?php echo $topic['title'] ?></a></li><?php } ?></ul>
</div><?php */?>	<!-- end col -->

<?php /*?><div class="footer-col">

<ul>
<li><a href="<?php echo base_url('services'); ?>" style="font-size:22px !important; font-weight:bold;">Services</a></li>
<li><a href="<?php echo base_url('services/view/peptide'); ?>">Peptide Level Determation</a></li>
<li><a href="<?php echo base_url('services/view/custom'); ?>">Custom Synthesis</a></li>
</ul>
</div><?php */?>	<!-- end col -->

<div class="footer-col" style="width:34% !important;">
<img style="padding-left:70px; padding-top: 46px;" src="<?php echo base_url('images/home');?>/footer-logo.png" alt="Phoenix Pharmaceuticals" class="img-responsive">
<div class="copyinfo">


<p>Copyright &copy 2016 Phoenix Pharmaceuticals. All Rights Reserved.</p>
</div>
</div>	<!-- end col -->

<div class="footer-col last">
<ul>
<li><a href="<?php echo base_url('about'); ?>">About Us</a></li>
<li><a href="<?php echo base_url('contact'); ?>">Contact us</a></li>
<li><a href="<?php echo base_url('privacy'); ?>">Privacy Policy</a></li>
<li><a href="<?php echo base_url('terms'); ?>">Terms of Use</a></li>
<li><a href="<?php echo base_url('order_information'); ?>">Order Information</a></li>
</ul>
</div>	<!-- end col -->
</div>	<!-- footer links -->



</div>
</footer>
