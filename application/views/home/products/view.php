<?php iconv_set_encoding('internal_encoding', 'UTF-8');
mb_internal_encoding('UTF-8'); ?>
<script>
$(document).ready(function() {
    $('#video_list').dataTable( {
        "paging":   false,
		"info":     false,
		"searching":     false,
    });
	
	$('.ontothree').click(function() {
		
		var title=$('#pseq').text();
		var id=$(this).attr('id');
		
		if(id=='one') {
			
			 $.ajax({
               url:"<?php echo base_url('services/getoneletter'); ?>",
               type:"post",
               dataType:"json",
               data:{
				   "letters":title,
			   },
               success:function(data){
           if(data.length!=[]){
                var html='';
                        for(var i=0; i<data.length; i++){
                            html = html + data[i].one_letter;
						
						}
						$('#pseq').text(html);
						
						                }
               }
               
                
            })
			
			
						$(this).attr('id','three');
						$(this).text('one to three');

			}
			
			else {
					 $.ajax({
               url:"<?php echo base_url('services/getthreeletter'); ?>",
               type:"post",
               dataType:"json",
               data:{
				   "letters":title,
			   },
               success:function(data){
          
           if(data.length!=[]){
                var html='';
                        for(var i=0; i<data.length; i++){
                            html = html+data[i].three_letters+'-';
						
						}
						
						$('#pseq').text(html.slice(0,-1));
              
				
				}
               }
               
                
            })
				
				  $(this).attr('id','one');
				$(this).text('three to one');
				}
		
		});
} );
</script>
<div id="page-body">
<div class="container">

<div class="prodpage-header clearfix" style="padding-bottom:20px">
<h3 class="pull-left"><?php if(!empty($productdetail['prefix'])) {echo $productdetail['prefix']; } echo $productdetail['product_name']; ?></h3>

<form method="post" action="https://phoenixpeptide.foxycart.com/cart">
<div class="pull-right">
<strong>Quantity:</strong>
<input type="text" style="width: 35px; margin-right:20px; text-align: center;" name="quantity" value="1">
<strong>Price:</strong>
<span>$<?php  $pricestring= str_replace(",", "", $productdetail['price']);
 $price=str_replace(".0000","",$pricestring);
 echo $price;?></span>


<input type="hidden" name="id" value="<?php echo $productdetail['p_id']; ?>" />
<input type="hidden" name="name" value="<?php echo $productdetail['product_name']; ?>" />
<input type="hidden" name="category" value="<?php echo $catid; ?>" />
<input type="hidden" name="price" value="<?php echo $price; ?>" />
<input type="hidden" name="catalog" value="<?php echo $productdetail['catalog']; ?>" />
<input type="hidden" name="size" value="<?php echo $productdetail['standard_size']; ?>" />
<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" />
<?php if($price=='0') { ?>
<button name="" onclick="window.location.href='<?php echo base_url('contact'); ?>'" type="button" class="btn orange">Contact Us</button>		
<?php }  else { ?>

<?php if($this->session->userdata('user_id')=='') { ?>
<button name="" onclick="$('#signin-pop').show(); window.scrollTo('20px', '30px');" type="button" class="btn orange" style="margin-left:20px;">Order</button>			
			<?php }  else { ?>
<button name="" style="margin-left:20px;" type="submit" class="btn orange">Order</button>
<?php }

} ?>

</div>	<!-- end table container -->

</form>
</div>
<div class="table-responsive borderless-table">
<table class="table table-striped">
<tbody>
<tr style="background-color:transparent">
<th style="width:130px;">Catalog#</th>
<th>Standard Size</th>
<!--<th>Species</th>-->
<th style="width:440px;"></th>
</tr>

<tr>
<td><?php echo $productdetail['catalog']; ?></td>
<td><?php echo $productdetail['standard_size']; ?></td>
<!--<td style="border-right:#263141 1px solid"><?php foreach($species as $row) {echo $row['name'].', '; } ?></td>-->
<td></td>

</tr>

</tbody></table>
</div>	<!-- end table container -->


<div class="odd-tabs">
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
<li  role="presentation"><a aria-expanded="true" href="#references" aria-controls="references" role="tab" data-toggle="tab">References</a></li>
<li class="" role="presentation"><a aria-expanded="false" href="#related-news" aria-controls="related-news" role="tab" data-toggle="tab">Related News</a></li>
<li class="active" role="presentation"><a aria-expanded="false" href="#technical" aria-controls="technical" role="tab" data-toggle="tab">Technical</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
<hr>
<div role="tabpanel" class="tab-pane active" id="technical">
<div class="row">
<div class="col-sm-8">
<ul class="list-properties">
<?php if($productdetail['msds']!='') { ?>
<li><strong>MSDS: </strong> <span class="viewspan"><a href="<?php echo base_url('uploads/icons/'.$productdetail['msds'] ) ?>" target="_blank"><?php echo $productdetail['msds']; ?></a></span></li> <?php } ?>
<?php if($productdetail['protocol']!='') { ?>
<li><strong>Protocols: </strong><span class="viewspan"><a href="<?php echo base_url('uploads/icons/'.$productdetail['protocol'] ) ?>" target="_blank"><?php echo $productdetail['protocol'] ?></a></span></li>
<?php } if($productdetail['rec_sample']!='') { ?>
<li><strong>Extraction Recommended: </strong><span class="viewspan"><?php echo $productdetail['rec_sample']; ?></span></li>
<?php } ?>
<?php   if($productdetail['sample_extration']!= '0' ) { 
if($productdetail['sample_extration']!='' ){
?>
<li><strong>Sample Extraction: </strong><span class="viewspan"><?php echo $productdetail['sample_extration']; ?></span></li>
<?php } } ?>
 <?php /*?><?php if($productdetail['sample_prepration']!='') { ?>
<li><strong>Sample Test Data: </strong> <?php echo $productdetail['sample_prepration'] ?></li>
<?php }  ?><?php */?>
<li><strong>Sample preparation : </strong><span class="viewspan"><a href="<?php echo base_url('support/view/sample_preparation') ?>" >View<?php echo $productdetail['sample_prepration']; ?></a></span></li>

<?php  if($productdetail['min_detect_concentration']!='') { ?>

<li><strong>Minimum Detectable Concentration: </strong><span class="viewspan"> <?php echo $productdetail['min_detect_concentration'] ?></span></li>
<?php } ?>

<?php  if($productdetail['standard_range']!='') { ?>

<li><strong>Standard Range: </strong> <span class="viewspan"><?php echo $productdetail['standard_range'] ?></span></li>
<?php } ?>

<?php  if($productdetail['dilution']!='') { ?>

<li><strong>Recommended Dilution Factor: </strong><span class="viewspan"> <?php echo $productdetail['dilution'] ?></span></li>
<?php } ?>

<?php  if($productdetail['rec_plasma_level']!='') { ?>

<li><strong>Preliminary Plasma Levels: </strong><span class="viewspan"> <?php echo $productdetail['rec_plasma_level'] ?></span></li>
<?php } ?>

</ul>
<div class="row">
<?php if($productdetail['molecular_weight']!='') { ?>

<div class="col-sm-4"><strong>M.W.: </strong> <?php echo $productdetail['molecular_weight'] ?></div>

<?php } if($productdetail['solubility']!='') { ?>

<div class="col-sm-4"><strong>Solubility: </strong><?php echo $productdetail['solubility'] ?></div>

<?php } if($productdetail['appearance']!='') { ?>

<div class="col-sm-4"><strong>Appearance: </strong> <?php echo $productdetail['appearance'] ?></div>


<?php  } if($productdetail['purity']!='') { ?>

<div class="col-sm-4"><strong>Purity: </strong> <?php echo $productdetail['purity'] ?></div>

<?php } if($productdetail['host']!='') { ?>

<div class="col-sm-4"><strong>Host: </strong><?php echo $productdetail['host'] ?></div> <?php } ?>


<?php  if($productdetail['radioactivity']!='') { ?>

<div class="col-sm-4"><strong>Radioactivity: </strong> <?php echo $productdetail['radioactivity'] ?></div>

<?php } if($productdetail['tracer']!='') { ?>

<div class="col-sm-4"><strong>Tracer: </strong><?php echo $productdetail['tracer'] ?></div>

<?php } if($productdetail['disclaimer']!='') { ?>

<div class="col-sm-4"><strong>Disclaimer: </strong><?php echo $productdetail['disclaimer'] ?></div>

<?php }  ?>

</div>
<?php if($productdetail['sequence']!='') { ?>
<strong class="strong_tab">Sequence</strong>

<p id="pseq" style="float: left;margin-right: 15px;"><?php echo strip_tags($productdetail['sequence']); ?></p><a href="javascript:void(0)" id="one" class="ontothree" title="<?php echo strip_tags($productdetail['sequence']); ?>">Three To One</a>
<?php } ?>

<?php if($productdetail['storage_conditions']!='') { ?>

<strong class="strong_tab">Storage Condition</strong>
<p><?php echo $productdetail['storage_conditions']; ?></p>
<?php } ?>
<?php if($productdetail['contents']!='') { ?>

<strong class="strong_tab">Contents</strong>
<p><?php echo $productdetail['contents']; ?></p>
<?php } ?>

<?php if($productdetail['cross_reactivity']!='') { ?>

<strong class="strong_tab">Cross Reactivity</strong>
<div class="table-responsive borderless-table"><?php echo $productdetail['cross_reactivity']; ?></div>
<?php } ?>
</div>
<div class="col-sm-4 text-right"><?php if($productdetail['standard_curve']!='') { ?>

<strong class="strong_tab" style="text-align:center;"><?php if($catid=='Kits') { ?>Standard Curve <?php } else { ?>Graph <?php } ?> </strong><img src="<?php echo base_url('uploads/icons/'.$productdetail['standard_curve'] ) ?>" style="width: 300px; height:350px" />
<!--<a href="<?php echo base_url('uploads/icons/'.$productdetail['standard_curve'] ) ?>" target="_blank"><?php echo $productdetail['standard_curve'] ?></li> -->
<?php } ?>
</div>
</div>
</div>


<div role="tabpanel" class="tab-pane" id="related-news"><?php if(!empty($topics)) { foreach($topics as $ptopics) {?><a href="<?php echo base_url('topics/view/'.$ptopics['topic_cat_id']) ?>"> <?php echo $ptopics['topic_title']; ?></a></br> <?php } } ?></div>
<div role="tabpanel" class="tab-pane" id="references"><?php echo $productdetail['reference'] ?></div>
</div>

</div>
</div>

<!--<h3 style="padding-top:20px;">More</h3>-->
<div class="table-responsive borderless-table">
<table class="table table-striped" id="video_list">
<thead>
<tr style="background-color:transparent">
<th class="catlog">Catalog#</th>
<th>Product</th>
<th>Standard Size</th>
<th>Price</th>
<th class="text-center">Buy Now</th>
</tr>
</thead>
<tbody>
<?php  foreach($products as $row) { ?>
<?php 
$pricestring= str_replace(",", "", $row['price']);
 $price=str_replace(".0000","",$pricestring);
 ?>
<tr>
<td><a href="<?php echo base_url('products/view/'.$catid.'/'.$row['catalog']); ?>" ><?php echo $row['catalog']; ?></a></td>
<td><a href="<?php echo base_url('products/view/'.$catid.'/'.$row['catalog']); ?>" > <?php if(!empty($row['prefix'])) {echo $row['prefix']; } echo $row['product_name']; ?> </a></td>
<td><a href="<?php echo base_url('products/view/'.$catid.'/'.$row['catalog']); ?>" ><?php echo $row['standard_size']; ?></a></td>
<td><a href="<?php echo base_url('products/view/'.$catid.'/'.$row['catalog']); ?>" >$<?php echo $price; ?></a></td>

<td class="text-center">
<form method="post" action="https://phoenixpeptide.foxycart.com/cart">
<input type="hidden" name="id" value="<?php echo $row['p_id']; ?>" />
<input type="hidden" name="category" value="<?php echo $catid; ?>" />
<input type="hidden" name="name" value="<?php echo $row['product_name']; ?>" />
<input type="hidden" name="quantity" value="1" />
<input type="hidden" name="price" value="<?php echo $price; ?>" />
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
<?php } ?>


</tbody></table>
</div>	<!-- end table container -->


</div>
