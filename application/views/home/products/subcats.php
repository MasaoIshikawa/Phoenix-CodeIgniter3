<script src="<?php echo base_url() ?>js/jquery.imgpreload.min.js"></script> 

<script src="<?php echo base_url() ?>js/isotope.pkgd.min.js"></script>
<script>
$(document).ready(function() {
	 var qsRegex;
var $container = $('#container').isotope({
			    itemSelector: '.catlistclc',
				filter: function() {
      return qsRegex ? $(this).text().match( qsRegex ) : true;
    }, 
	resizable: false, // disable normal resizing

  // set columnWidth to a percentage of container width

  masonry: { columnWidth: '.catlistclc', gutter: '.gutter-sizer' }
	
	 });
	var $quicksearch = $('#searchrecipe').keyup( debounce( function() {
    qsRegex = new RegExp( $quicksearch.val(), 'gi' );
    $container.isotope();
  }, 200 )); 
	 
	  });
	  
	  
	  function debounce( fn, threshold ) {
  var timeout;
  return function debounced() {
    if ( timeout ) {
      clearTimeout( timeout );
    }
    function delayed() {
      fn();
      timeout = null;
    }
    timeout = setTimeout( delayed, threshold || 100 );
  }
}
</script>

<div id="page-body">
<div class="container">
<h1 class="page-title"><?php echo $catdata['title']; ?></h1>
<ul class="prod-list clearfix" id="container">
<div class='gutter-sizer'></div>

<?php foreach($subcatlist as $row ) { ?>
<li class="catlistclc">
<div class="prod-img"><img src="<?php echo base_url('uplods/icons/'.$row['icon_sub']); ?>" class="img-responsive" alt=" "></div>
<h3><?php echo $row['sub_title']; ?></h3>
<p><?php echo $row['sub_description']; ?></p>
<a href="<?php echo base_url('products/subcategory/'.$catdata['cat_id'].'/'.$row['sub_cat_id']); ?>">View more</a>

</li>

<?php } ?>


</ul>
</div>
</div>
