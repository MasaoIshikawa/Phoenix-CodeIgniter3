<?php iconv_set_encoding('internal_encoding', 'UTF-8');
mb_internal_encoding('UTF-8'); ?>
<div style="min-height: 10px;" id="page-body" class="clearfix">
<?php $this->load->view('admin/left-menu'); ?>	<!-- end left menu -->

   
    <!-- end left menu -->
    
    <div id="right-contents" class="edit-order add-products product-view"> 
      
      <!--page title -->
      <div class="page-title clearfix">
        <h1>View a Product </h1>
      </div>
      <!--/page title -->
      <form>
        <div class="row">
          <div class="col-sm-6">
            <div class="order-section">
              <dl class="dl-horizontal">
                <dt>Catalog#:</dt>
                <dd>
                  <span><?php echo $product_detail['catalog']; ?></span>
                </dd>
                <dt>Product Name:</dt>
                <dd>
                  <span><?php echo $product_detail['product_name']; ?></span>
                </dd>
                <dt>Alterantive Name:</dt>
                <dd>
               <span><?php echo $product_detail['alternative_name']; ?></span>
                </dd>
                <dt>Family</dt>
                <dd>
                 <span>Lorem Ipsum</span>
                </dd>
                
                <dt>Prefix:</dt>
                <dd>
                <span><?php echo $product_detail['prefix']; ?></span>
                </dd>
                <dt>Size:</dt>
                <dd>
                <span><?php echo $product_detail['standard_size']; ?></span>
                </dd>
                <dt>Price:</dt>
                <dd>
                <span>
				
				$<?php
				 $pricestring= str_replace(",", "", $product_detail['price']);
 echo $price=str_replace(".0000","",$pricestring);
				 ?></span>
                </dd>
                <dt>Molecular Weight:</dt>
                <dd>
                <span><?php echo $product_detail['molecular_weight']; ?></span>
                </dd>
                <dt>Solubility:</dt>
                <dd>
                <span><?php echo $product_detail['solubility']; ?></span>
                </dd>
                <dt>Apperance:</dt>
                <dd>
                <span><?php echo $product_detail['appearance']; ?></span>
                </dd>
                <dt>Purity:</dt>
                <dd>
                <span><?php echo  htmlentities($product_detail['purity']); ?></span>
                </dd>
                <dt>Cross Reactivity:</dt>
                <dd>
                <span><?php echo $product_detail['cross_reactivity']; ?></span>
                </dd>
                <dt>Minimum Detection:</dt>
                <dd>
                <span><?php echo $product_detail['min_detect_concentration']; ?></span>
                </dd>
                <dt>Standard Range:</dt>
                <dd>
                <span><?php echo $product_detail['standard_range']; ?></span>
                </dd>
                
                <dt>Recomended Sample:</dt>
                <dd>
                <span><?php echo $product_detail['rec_sample']; ?></span>
                </dd>
                
                <dt>Dilution:</dt>
                <dd>
                <span><?php echo $product_detail['dilution']; ?></span>
                </dd>
                
                <dt>Protocol:</dt>
                <dd>
                <span><?php echo $product_detail['protocol']; ?></span>
                </dd>
                
                <dt>Samlple Preparation:</dt>
                <dd>
                <span><?php echo $product_detail['sample_prepration']; ?></span>
                </dd>
                
                <dt>Sample Extraction:</dt>
                <dd>
                <span><?php echo $product_detail['sample_extration']; ?></span>
                </dd>
                
                <dt>Recomended Plasma Level:</dt>
                <dd>
                <span><?php echo $product_detail['rec_plasma_level']; ?></span>
                </dd>
                
                <dt>Standard Curve:</dt>
                <dd>
                <span><?php echo $product_detail['standard_curve']; ?></span>
                </dd>
                
                <dt>Discalimer:</dt>
                <dd>
                <span><?php echo $product_detail['disclaimer']; ?></span>
                </dd>
                <dt>Host:</dt>
                <dd>
                <span><?php echo $product_detail['host']; ?></span>
                </dd>
                
                
              </dl>
            </div>
          </div>
          <div class="col-sm-6">
            <h4><strong>Spieces</strong></h4>
            <div class="row product-checkboxes">
              <div>
               <?php
		   foreach($product_species as $pspecies) { 
		    ?>
            <span class="col-md-5">
            <p>
                    <span> <?php echo  $pspecies['name']; ?></span>
                </p>
                </span>
                <?php } ?>
              </div>
              
            </div>
            <h4><strong>Categories</strong></h4>
            <div class="row product-checkboxes">
              <div>
               <?php  foreach($product_cats as $pcats) {  ?>
               <span  class="col-md-5">
                <p>
                <span><?php echo  $pcats['title']; ?></span>
                </p>
                </span>
				<?php } ?>
              </div>
              
            </div>
            <h4><strong>Subcategories</strong></h4>
            <div class="row product-checkboxes">
              <div>
                <?php 
				
				foreach($product_subcats as $psubcats) { $selected_subcats[]= $psubcats['subcat_assigned_id']; ?><span  class="col-md-5">
                <p>
                 <span><?php echo $psubcats['sub_title'] ?></span>
                </p>
                </span>
                <?php } ?>
              </div>
             
            </div>
           
          
          </div>
        </div>
        <div class="row">
          <dl class="dl-horizontal">
            <dt>Sequence:</dt>
                <dd>
                <span><?php echo $product_detail['sequence']; ?></span>
                </dd>
            <dt>Storage Condition:</dt>
            <dd>
              <span><?php echo $product_detail['storage_conditions']; ?></span>
            </dd>
            <dt>Content:</dt>
            <dd>
              <span><?php echo $product_detail['contents']; ?></span>
            </dd>
            <dt>Reference:</dt>
            <dd>
            <span><?php echo $product_detail['reference']; ?></span>
            </dd>
            <dt>Comments:</dt>
            <dd>
              <span><?php echo $product_detail['comment']; ?></span>
            </dd>
            <dt style="padding-top: 7px;">MSDS:</dt>
            <dd><span><?php echo $product_detail['msds']; ?></span></dd>
            <dt>Tracer:</dt>
            <dd>
             <span> <?php if( $product_detail['tracer']==1) { echo 'Yes'; } else { echo 'No'; } ?></span>
            </dd>
          </dl>
          <p class="text-right">
         
<a class="link-btn grey" href="<?php echo base_url('admin/products/delete_prodcuts/'.$product_detail['p_id']); ?>"  title="remove">Remove</a>

           <a class="link-btn green" href="<?php echo base_url('admin/products/edit/'.$product_detail['p_id']); ?>">Edit</a></p>
        </div>
      </form>
    </div>
    <!-- end right contents --> 
  </div>
  
