<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
<!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">
<div class="item active">
<div class="slidimg">
<?php echo $home_page_slide_1['data']; ?>
</div>
<div class="carousel-caption">
<h3><?php echo $home_content['title']; ?></h3>
<p class="hidden-xs"><?php echo $home_content['data']; ?></p>
</div>
</div>	<!-- end item -->

<div class="item">
<div class="slidimg">
<?php echo $home_page_slide_2['data']; ?>
</div>
<div class="carousel-caption">
<h3><?php echo $home_content['title']; ?></h3>
<p class="hidden-xs"><?php echo $home_content['data']; ?></p>
</div>
</div>	<!-- end item -->

<div class="item">
<div class="slidimg">
<?php echo $home_page_slide_3['data']; ?>
</div>
<div class="carousel-caption">
<h3><?php echo $home_content['title']; ?></h3>
<p class="hidden-xs"><?php echo $home_content['data']; ?></p>
</div>
</div>		<!-- end item -->
</div>

<!-- Controls -->
<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
<span class="previous-arrow" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
<span class="next-arrow" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>	<!-- end slider -->

<div class="rt-cont">
<div class="container">
<h2 class="heading-devider">Research Topics</h2>
<div class="row">

<?php foreach($topiclist as $topic ) { ?>

<div class="col-sm-2"><a href="<?php echo base_url('topics/view/'.$topic['cat_id']); ?>"><img src="<?php echo base_url('uploads/icons/'.$topic['icon']);?>" class="img-responsive" alt="<?php echo $topic['title'] ?>"><?php echo $topic['title'] ?></a></div>
<?php } ?>

</div>	<!-- end row -->
</div>
</div>	<!-- end research article container -->

<div class="container">

<div class="content-bottom">
<h2 class="heading-devider">What’s New</h2>
<div class="banner-bottom">
<div class="bottm-lid-img">
<?php echo $what_new_section_image['data']; ?>
</div>
<div class="banner-text">

<h2><?php echo $what_new_section['title']; ?></h2>
<p class="hidden-xs"><?php echo $what_new_section['data']; ?></p>
</div>
</div>	<!--posta -->

<div class="row">
<div class="col-sm-4 post-col">
<?php echo $home_page_blog_image_1['data']; ?>
<h2><?php echo $home_page_blog_1['title']; ?></h2>
<p><?php echo $home_page_blog_1['data']; ?></p>
</div>

<div class="col-sm-4 post-col">
<?php echo $home_page_blog_image_2['data']; ?>
<h2><?php echo $home_page_blog_2['title']; ?></h2>
<p><?php echo $home_page_blog_2['data']; ?></p>
</div>

<div class="col-sm-4 post-col">
<?php echo $home_page_blog_image_3['data']; ?>
<h2><?php echo $home_page_blog_3['title']; ?></h2>
<p><?php echo $home_page_blog_3['data']; ?></p>
</div>
</div>	<!--/posts -->
</div>
</div>	<!-- end container -->
