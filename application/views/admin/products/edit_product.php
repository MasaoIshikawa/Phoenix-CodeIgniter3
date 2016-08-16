<script type="text/javascript" src="<?php echo base_url()?>js/tiny_mce_new/tiny_mce.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/tiny_mce_new/init_tiny.js"></script>
<div style="min-height: 10px;" id="page-body" class="clearfix">
<?php $this->load->view('admin/left-menu'); ?>	<!-- end left menu -->

   
    <!-- end left menu -->
    
    <div id="right-contents" class="edit-order add-products"> 
      
      <!--page title -->
      <div class="page-title clearfix">
        <div class="view-title"><?php echo $product_detail['prefix']; echo $product_detail['product_name']; ?></div>
      </div>
      <!--/page title -->
      
      <form method="post" id="file_upload" style="display:none;">
           
            <input type="file" accept="image/*" class="upload" name="file" style="display:none" >
        
        </form>
        <form method="post" id="file_upload_protocol" style="display:none;">
           
            <input type="file" accept="image/*" class="upload_protocol_im" name="file" style="display:none" >
        
        </form>
         <form method="post" id="file_upload_graph" style="display:none;">
           
            <input type="file" accept="image/*" class="upload_graph_im" name="file" style="display:none" >
        
        </form>
      <form id="product_form" method="post" action="<?php echo base_url('admin/products/update') ?>">
        <div class="row">
          <div class="col-sm-6">
            <div class="order-section">
              <dl class="dl-horizontal">
                <dt>Catalog#:</dt>
                <dd>
                  <input name="p_id" value="<?php echo $product_detail['p_id']; ?>"  class="form-control validate[required]" type="hidden">
                  <input name="catalog" value="<?php echo $product_detail['catalog']; ?>"  class="form-control validate[required]" type="text">
                </dd>
                <dt>Product Name:</dt>
                <dd>
                  <input name="product_name" value="<?php echo $product_detail['product_name']; ?>"  class="form-control validate[required]" type="text">
                </dd>
                <dt>Alterantive Name:</dt>
                <dd>
                  <input name="alternative_name" value="<?php echo $product_detail['alternative_name']; ?>"  class="form-control" type="text">
                </dd>
                <dt>Family</dt>
                <dd>
                  <select name="family" class="form-control">
                    <?php foreach ($family as $rowf) { ?>
                    <option <?php if($rowf['name']==$product_detail['family']) echo 'selected=selected'; ?> value="<?php echo $rowf['name'] ?>"><?php echo $rowf['name'] ?></option>
                    <?php } ?>
                    </select>
                </dd>
                
                <dt>Prefix:</dt>
                <dd>
                  <input name="prefix" value="<?php echo $product_detail['prefix']; ?>"  class="form-control" type="text">
                </dd>
                <dt>Standard Size:</dt>
                <dd>
                  <input name="standard_size" value="<?php echo $product_detail['standard_size']; ?>"  class="form-control validate[required]" type="text">
                </dd>
                <dt>Price:</dt>
                <dd>
                  <input name="price" value="<?php $pricestring= str_replace(",", "", $product_detail['price']);
 echo str_replace(".0000","",$pricestring);  ?>"  class="form-control validate[required,custom[onlyNumberSp]]" type="text">
                </dd>
             
             <div id="molecular_weight" style="display:none;" >
               
                <dt>Molecular Weight:</dt>
                <dd>
                  <input name="molecular_weight"  value="<?php echo $product_detail['molecular_weight']; ?>" class="form-control" type="text">
                </dd>
                </div>
                
                <div id="solubility" style="display:none;" >
                <dt>Solubility:</dt>
                <dd>
                  <input name="solubility" value="<?php echo $product_detail['solubility']; ?>"  class="form-control" type="text">
                </dd>
                </div>
                
              <div id="appearance" style="display:none;">  
                <dt>Apperance:</dt>
                <dd>
                  <input name="appearance" value="<?php echo $product_detail['appearance']; ?>"  class="form-control" type="text">
                </dd>
        </div>
        <div id="purity" style="display:none;">
                <dt>Purity:</dt>
                <dd>
                  <input name="purity" value="<?php echo $product_detail['purity']; ?>"  class="form-control" type="text">
                </dd>
                </div>
                
        <div id="min_detect_concentration" style="display:none;">
                <dt>Minimum Detection Concentration:</dt>
                <dd>
                  <input name="min_detect_concentration" value="<?php echo $product_detail['min_detect_concentration']; ?>"  class="form-control" type="text">
                </dd>
                </div>
                
                <div id="standard_range" style="display:none;">
              
                <dt>Standard Range:</dt>
                <dd>
                  <input name="standard_range" value="<?php echo $product_detail['standard_range']; ?>"  class="form-control" type="text">
                </dd>
                </div>
                <div id="rec_sample" style="display:none;">
              
                <dt>Recommended Sample:</dt>
                <dd>
                  <input name="rec_sample" value="<?php echo $product_detail['rec_sample']; ?>"  class="form-control" type="text">
                </dd>
                </div>
                
                <div id="dilution" style="display:none;">
                <dt>Recommended Dilution Factor:</dt>
                <dd>
                  <input name="dilution" value="<?php echo $product_detail['dilution']; ?>"   class="form-control" type="text">
                </dd>
            </div>
            
            <div id="Protocol" style="display:none;">
                <dt>Protocol:</dt>
                <dd>
                  <input name="protocol" id="upload_protocol" value="<?php echo $product_detail['protocol'] ?>"  class="form-control" type="text">
                  <a href="#" class="choose-button upload_protocol"><img alt="" src="<?php echo base_url('images') ?>/add-file.png" height="18" width="18"> Choose File</a>
                </dd>
                </div>
            
            <div id="sample_prepration" style="display:none;">
                <dt>Sample prepration:</dt>
                <dd>
                  <input name="sample_prepration" value="<?php echo $product_detail['sample_prepration']; ?>"  class="form-control" type="text">
                </dd>
                </div>
                
                <div id="sample_extration" style="display:none;">
                <dt>Sample Extraction Recommended:</dt>
                <dd>
              <label class="label-check" style="margin-top:0">
                <input value="YES" <?php if($product_detail['sample_extration']=='YES') echo 'checked=checked'; ?> name="sample_extration" type="radio">
                Yes</label>
              <label class="label-check" style="margin-top:0">
                <input value="NO" <?php if($product_detail['sample_extration']=='NO') echo 'checked=checked'; ?>  name="sample_extration" type="radio">
                No</label>
            </dd>
            </div>
            
                <div id="rec_plasma_level" style="display:none;">
                <dt>Preliminary Plasma Levels:</dt>
                <dd>
                   <input name="rec_plasma_level" value="<?php echo $product_detail['rec_plasma_level']; ?>"  class="form-control" type="text">
                </dd>
                </div>
                <div id="standard_curve" style="display:none;">
                <dt id="othercat" style="display:none;">Graph:</dt>
                <dt id="kitcat" style="display:none;">Standard Curve:</dt>
                <dd>
                  <input name="standard_curve" value="<?php echo $product_detail['standard_curve']; ?>" id="upload_curve"  class="form-control" type="text"><a href="#" class="choose-button upload_curve"><img alt="" src="<?php echo base_url('images') ?>/add-file.png" height="18" width="18"> Choose File</a>
                </dd>
                </div>
                
                <div id="disclaimer" style="display:none;">
                <dt>Disclaimer:</dt>
                <dd>
                 <input name="disclaimer" value="<?php echo $product_detail['disclaimer']; ?>" class="form-control" type="text">
                </dd>
                </div>
                
                <div id="host" style="display:none;">
                 <dt>Host:</dt>
                <dd>
                   <input name="host" value="<?php echo $product_detail['host']; ?>" class="form-control" type="text">
                </dd>
                
                </div>
            <div id="radioact" style="display:none;">
                 <dt>Host:</dt>
                <dd>
                  <input name="radioactivity" value="<?php echo $product_detail['radioactivity']; ?>"  class="form-control" type="text">
                </dd>
                
                </div>
               
              </dl>
            </div>
          </div>
          <div class="col-sm-6">
            <h4><strong>Species</strong></h4>
            <div class="row product-checkboxes">
           <div>
		   <?php
		   foreach($product_species as $pspecies) { $selected_species[]= $pspecies['specie_assigned_id'];}
		    foreach($species as $spec) { ?>
           <?php 
			   if (false !== $key = array_search($spec['id'],$selected_species)) { ?>
			   <span class="col-md-6"> 
                
                <p>
                  <label class="label-check" for="spec_<?php echo $spec['id'] ?>">
                    <input id="spec_<?php echo $spec['id'] ?>" class="checkbox" name="species[]" type="checkbox"<?php echo 'checked=chekced' ?> value="<?php echo $spec['id'] ?>">
                    <?php echo $spec['name']; ?></label>
                </p>
                </span>
               <?php }
			   else { ?>
              <span class="col-md-6">
               <p>
                  <label class="label-check" for="spec_<?php echo $spec['id'] ?>">
                    <input id="spec_<?php echo $spec['id'] ?>" class="checkbox" name="species[]" type="checkbox" value="<?php echo $spec['id'] ?>">
                    <?php echo $spec['name']; ?></label>
                </p>
               </span>
               
			    <?php } } ?>
               </div> 
            </div>
            <h4><strong>Category</strong></h4>
            <div class="row product-checkboxes">
             
              <div>
                 
              <?php 
			  foreach($product_cats as $pcats) { $selected_cats[]= $pcats['cat_assigned_id'] ;
			  if($pcats['cat_assigned_id']==19 ||$pcats['cat_assigned_id'] == 20) {
			   ?>
			  
			  
			  <script>
              $(document).ready(function() {	  
			$('#molecular_weight').show();
			$('#solubility').show();
			$('#appearance').show();
			$('#purity').show();
			$('#standard_curve').show();
			$('#othercat').show();
				  });
              </script>
			  
			  <?php
			  } 
                if($pcats['cat_assigned_id']==22) {
			   ?>
			  
			  
			  <script>
              $(document).ready(function() {	  
			$('#standard_curve').show();
			$('#kitcat').show();
				  });
              </script>
			  
			  <?php
			  } ?>
              
			  <?php }
			  
			  foreach($catlist as $cat) { ?>
                
                <?php 
			   if (false !== $key = array_search($cat['cat_id'],$selected_cats)) { ?>
			   <span class="col-md-6">
                <p>
                  <label class="label-check" for="cat_<?php echo $cat['cat_id'] ?>">
                    <input id="cat_<?php echo $cat['cat_id'] ?>" class="checkbox catcheck" name="category[]" type="checkbox" <?php echo 'checked=checked'; ?> value="<?php echo $cat['cat_id'] ?>">
                    <?php echo $cat['title']; ?></label>
                </p>
                </span>
               <?php }
			   else { ?>
               <span class="col-md-6">
               <p>
                  <label class="label-check" for="cat_<?php echo $cat['cat_id'] ?>">
                    <input id="cat_<?php echo $cat['cat_id'] ?>" class="checkbox catcheck" name="category[]" type="checkbox"  value="<?php echo $cat['cat_id'] ?>">
                    <?php echo $cat['title']; ?></label>
                </p>
			   </span>
			   <?php } } ?>  
              </div>
              
             
            </div>
            <h4><strong>Subcategory</strong></h4>
            <div class="row product-checkboxes">
              
              <div>
                <?php 
				if(!empty($product_subcats) ) {
				foreach($product_subcats as $psubcats) {
					
					
					 $selected_subcats[]= $psubcats['subcat_assigned_id'];
					 if($psubcats['subcat_assigned_id']==6 ||$psubcats['subcat_assigned_id'] == 7) {
			   ?>
			  
			  
			  <script>
              $(document).ready(function() {	  
			
			
			$('#solubility').show();
			$('#appearance').show();
			$('#standard_curve').show();
			$('#host').show();
			$('#cross_reactivity').show();
			$('#othercat').show();
			$('#dilution').show();	
			
			
				  });
              </script>
			  
			  <?php
			  }
			  
			   if($psubcats['subcat_assigned_id']==9 ||$psubcats['subcat_assigned_id'] == 10 || $psubcats['subcat_assigned_id'] == 12) {
			   ?>
			  
			  
			  <script>
              $(document).ready(function() {	  
			
			
			
			$('#host').show();
			$('#cross_reactivity').show();
			$('#min_detect_concentration').show();
			$('#standard_range').show();
			$('#dilution').show();
			$('#Protocol').show();
			$('#sample_prepration').show();
			$('#sample_extration').show();
			$('#rec_plasma_level').show();
			
				
			
			
			
				  });
              </script>
			  
			  <?php
					
					
			   }
			   if($psubcats['subcat_assigned_id']==9 ||$psubcats['subcat_assigned_id'] == 14) {
			   ?>
			  
			  
			  <script>
              $(document).ready(function() {	  
			$('#disclaimer').show();
			$('#tracer').show();
				  });
              </script>
			  
			  <?php
					
					
			   }
			      if($psubcats['subcat_assigned_id']==9 ) {
			   ?>
			  
			  
			  <script>
              $(document).ready(function() {	  
			$('#radioact').show();
				  });
              </script>
			  
			  <?php
					
					
			   }
					 }
				foreach($subcatlist as $subcat) { ?>
                
                 <?php 
			   if (false !== $key = array_search($subcat['sub_cat_id'],$selected_subcats)) { ?>
               
               
               <span class="col-md-6">
                <p>
                  <label class="label-check" for="subcat_<?php echo $subcat['sub_cat_id'] ?>">
                    <input id="subcat_<?php echo $subcat['sub_cat_id'] ?>" name="sub_category[]" <?php echo 'checked=checked'; ?>  value="<?php echo $subcat['sub_cat_id'] ?>" class="subcatcheck"  type="checkbox">
                    <?php echo $subcat['sub_title'] ?></label>
                </p>
                </span>
                <?php } else { ?> 
				<span class="col-md-6">
				<p>
                  <label class="label-check" for="subcat_<?php echo $subcat['sub_cat_id'] ?>">
                    <input id="subcat_<?php echo $subcat['sub_cat_id'] ?>" class="subcatcheck" name="sub_category[]" value="<?php echo $subcat['sub_cat_id'] ?>" type="checkbox">
                    <?php echo $subcat['sub_title'] ?></label>
                </p>
                </span>
				<?php  }
				
				}
				
				}?>
                
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <dl class="dl-horizontal">
            <dt>Cross Reactivity:</dt>
                <dd>
                  <textarea name="cross_reactivity"  class="form-control"><?php echo $product_detail['cross_reactivity']; ?></textarea>
                </dd>
            <dt>Sequence:</dt>
                <dd>
          
                  <textarea name="sequence" class="form-control"><?php echo $product_detail['sequence']; ?></textarea>
                </dd>
            <dt>Storage Condition:</dt>
            <dd class="formerrorvalid">
              <textarea name="storage_conditions" class="form-control"><?php echo $product_detail['storage_conditions']; ?></textarea>
            </dd>
            <dt>Content:</dt>
            <dd class="formerrorvalid">
              <textarea name="contents" class="form-control"><?php echo $product_detail['contents']; ?></textarea>
            </dd>
            <dt>Reference:</dt>
            <dd class="formerrorvalid">
              <textarea name="reference" class="form-control"><?php echo $product_detail['reference']; ?></textarea>
            </dd>
            <dt>Comments:</dt>
            <dd class="formerrorvalid">
              <textarea name="comment" class="form-control"><?php echo $product_detail['comment']; ?></textarea>
            </dd>
            <dt style="padding-top: 7px;">MSDS:</dt>
            <dd>
            <input type="text" name="msds" readonly="readonly" value="<?php echo $product_detail['msds']; ?>" id="reci_image" />
            <a href="#" class="choose-button upload_img"><img alt="" src="<?php echo base_url('images') ?>/add-file.png" height="18" width="18"> Choose File</a></dd>
            <dt>Tracer:</dt>
            <dd>
            <input name="tracer"  class="form-control" value="<?php echo $product_detail['tracer']; ?>" type="text">
            </dd>
            
          </dl>
          <p class="text-right"><a class="link-btn grey" href="<?php echo base_url('admin/products') ?>">Cancel</a> 
          <a class="link-btn green" onclick="$('#product_form').submit();" href="javascript:void(0)">Save</a></p>
        </div>
      </form>
    </div>
    <!-- end right contents --> 
  </div>
  <script>
  
function setupLabel() {
       
		if ($('.label-check input').length) {
            $('.label-check').each(function(){
                $(this).removeClass('c-on');
            });
            $('.label-check input:checked').each(function(){
                $(this).parent('label').addClass('c-on');
            });               
        };
    }
	
    $(document).ready(function(){
        $('.label-check').click(function(){
          
		    setupLabel();
        });
        setupLabel();
    });
	
 $('#product_form').validationEngine('attach');
	var $customer_type = $('input:checkbox[name="species[]"]');
	$customer_type.addClass("validate[required]");

var $occupation = $('input:checkbox[name="category[]"]');
$occupation.addClass("validate[required]");

var $products_categories = $('input:checkbox[name="sub_category[]"]');
$products_categories.addClass("validate[required]");
  </script>
  
  <script>
$(document).ready(function(e) {

		$('.upload_img').click(function() {
        
		    $('.upload').click();
       
		});
		
			$('#file_upload').fileupload({
				
			url: '<?php echo base_url('admin/products/addprofile_pdf'); ?>',
			dataType: 'json',
			done: function (e, data) {				
				$('#reci_image').val(data._response.result[1]);
				$('#profileim').attr("src", data._response.result[0]);
				if(data._response.result[0]=='error') {alert('error please upload correct type')}
			}
		});
		
		
			$('.upload_protocol').click(function() {
        
		    $('.upload_protocol_im').click();
       
		});
		
			$('#file_upload_protocol').fileupload({
				
			url: '<?php echo base_url('admin/products/addprofile_img'); ?>',
			dataType: 'json',
			done: function (e, data) {				
				$('#upload_protocol').val(data._response.result[1]);
				//$('#profileim').attr("src", data._response.result[0]);
				
			}
		});
		
		
		$('.upload_curve').click(function() {
        
		    $('.upload_graph_im').click();
       
		});
		
			$('#file_upload_graph').fileupload({
				
			url: '<?php echo base_url('admin/products/addprofile_img'); ?>',
			dataType: 'json',
			done: function (e, data) {				
				$('#upload_curve').val(data._response.result[1]);
				//$('#profileim').attr("src", data._response.result[0]);
				
			}
		});
		
		
		
		$('.catcheck').click(function(){
		
		var id=$(this).attr('id');
		
		var newid= id.replace('cat_', '');
		
		
			if($(this).is(':checked')) {
		
		if(newid=='19' || newid=='20') {
			$('#molecular_weight').show();
			$('#solubility').show();
			$('#appearance').show();
			$('#purity').show();
			$('#standard_curve').show();
			$('#othercat').show();
			
			}
			if(newid=='22') {
			
			$('#standard_curve').show();
			$('#kitcat').show();
			$('#othercat').hide();
			
			}	
			
			 
		 }
				 
				 else {
					 
				$('#molecular_weight').hide();
				$('#solubility').hide();
				$('#appearance').hide();
				$('#purity').hide();
				$('#standard_curve').hide();
				
			
					$('.'+id).remove(); 
					 
					 }
			
			
			});
			
			
			$('body').on('click','.subcatcheck',function(){
		
		var id=$(this).attr('id');
		
		var newid= id.replace('subcat_', '');
		
		
			if($(this).is(':checked')) {
			if(newid=='6' || newid=='7') {
			
			$('#solubility').show();
			$('#appearance').show();
			$('#standard_curve').show();
			$('#host').show();
			$('#cross_reactivity').show();
			$('#dilution').show();	
			
			}
			
			if(newid=='9' || newid=='10' || newid=='12' ) {
			$('#host').show();
			$('#cross_reactivity').show();
			$('#min_detect_concentration').show();
			$('#standard_range').show();
			$('#dilution').show();
			$('#Protocol').show();
			$('#sample_prepration').show();
			$('#sample_extration').show();
			$('#rec_plasma_level').show();
			
				
			}
			if(newid=='14' || newid=='9') {
			
			$('#disclaimer').show();
			$('#tracer').show();
			}
			if(newid=='9') {
			
			$('#radioact').show();	
				
				}
			
			
			}
			
			
			else {
					 
				$('#solubility').hide();
				$('#appearance').hide();
				$('#standard_curve').hide();
				$('#host').hide();
				$('#cross_reactivity').hide();
				$('#dilution').hide();
				$('#host').hide();
				$('#cross_reactivity').hide();
				$('#min_detect_concentration').hide();
				$('#standard_range').hide();
				$('#dilution').hide();
				$('#Protocol').hide();
				$('#sample_prepration').hide();
				$('#sample_extration').hide();
				$('#rec_plasma_level').hide(); 
				$('#disclaimer').hide();
				$('#tracer').hide();
				$('#radioact').hide();	 
					 
					 }
			
			});
			
		
});
</script>
