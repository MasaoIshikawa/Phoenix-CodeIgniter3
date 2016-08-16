<script type="text/javascript" src="<?php echo base_url()?>js/tiny_mce_new/tiny_mce.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/tiny_mce_new/init_tiny.js"></script>
<div style="min-height: 10px;" id="page-body" class="clearfix">
<?php $this->load->view('admin/left-menu'); ?>	<!-- end left menu -->

   
    <!-- end left menu -->
    
    <div id="right-contents" class="edit-order add-products"> 
      
      <!--page title -->
      <div class="page-title clearfix">
        <div class="view-title">Provide Details</div>
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
      <form id="product_form" method="post" action="<?php echo base_url('admin/products/save') ?>">
        <div class="row">
          <div class="col-sm-6">
            <div class="order-section">
              <dl class="dl-horizontal">
                <dt>Catalog#:</dt>
                <dd>
                  <input name="catalog"  class="form-control validate[required]" type="text">
                </dd>
                <dt>Product Name:</dt>
                <dd>
                  <input name="product_name"  class="form-control validate[required]" type="text">
                </dd>
                <dt>Alterantive Name:</dt>
                <dd>
                  <input name="alternative_name"  class="form-control" type="text">
                </dd>
                <dt>Family</dt>
                <dd>
                  <select name="family"  class="form-control">
                    <?php foreach ($family as $rowf) { ?>
                    <option value="<?php echo $rowf['name'] ?>"><?php echo $rowf['name'] ?></option>
                    <?php } ?>
                  </select>
                </dd>
            
               
                <dt>Prefix:</dt>
                <dd>
                  <input name="prefix"  class="form-control" type="text">
                </dd>
                <dt>Standard Size:</dt>
                <dd>
                  <input name="standard_size"  class="form-control validate[required]" type="text">
                </dd>
                <dt>Price:</dt>
                <dd>
                  <input name="price"  class="form-control validate[required,custom[onlyNumberSp]]" type="text">
                </dd>
                
                <div id="molecular_weight" style="display:none;" >
                <dt>Molecular Weight:</dt>
                <dd>
                  <input name="molecular_weight"  class="form-control" type="text">
                </dd>
                </div>
                
                <div id="solubility" style="display:none;" >
                <dt>Solubility:</dt>
                <dd>
                  <input name="solubility"  class="form-control" type="text">
                </dd>
                </div>
                
              <div id="appearance" style="display:none;">  
                <dt>Apperance:</dt>
                <dd>
                  <input name="appearance" class="form-control" type="text">
                </dd>
        </div>
        <div id="purity" style="display:none;">
                <dt>Purity:</dt>
                <dd>
                  <input name="purity"  class="form-control" type="text">
                </dd>
                </div>
                
        <div id="min_detect_concentration" style="display:none;">
                <dt>Minimum Detection Concentration:</dt>
                <dd>
                  <input name="min_detect_concentration"  class="form-control" type="text">
                </dd>
                </div>
                
                <div id="standard_range" style="display:none;">
              
                <dt>Standard Range:</dt>
                <dd>
                  <input name="standard_range"  class="form-control" type="text">
                </dd>
                </div>
                <div id="rec_sample" style="display:none;">
              
                <dt>Recommended Sample:</dt>
                <dd>
                  <input name="rec_sample"  class="form-control" type="text">
                </dd>
                </div>
                
                <div id="dilution" style="display:none;">
                <dt>Recommended Dilution Factor:</dt>
                <dd>
                  <input name="dilution"   class="form-control" type="text">
                </dd>
            </div>
            
            <div id="Protocol" style="display:none;">
                <dt>Protocol:</dt>
                <dd>
                  <input name="protocol" id="upload_protocol"  class="form-control" type="text"><a href="#" class="choose-button upload_protocol"><img alt="" src="<?php echo base_url('images') ?>/add-file.png" height="18" width="18"> Choose File</a>
                </dd>
                </div>
            
            <div id="sample_prepration" style="display:none;">
                <dt>Sample prepration:</dt>
                <dd>
                  <input name="sample_prepration"  class="form-control" type="text">
                </dd>
                </div>
                
                <div id="sample_extration" style="display:none;">
                <dt>Sample Extraction Recommended:</dt>
                <dd>
              <label class="label-check" style="margin-top:0">
                <input value="YES" name="sample_extration" type="radio">
                Yes</label>
              <label class="label-check" style="margin-top:0">
                <input value="NO" name="sample_extration" type="radio">
                No</label>
            </dd>
            </div>
            
                <div id="rec_plasma_level" style="display:none;">
                <dt>Preliminary Plasma Levels:</dt>
                <dd>
                  <input name="rec_plasma_level"  class="form-control" type="text">
                </dd>
                </div>
                <div id="standard_curve" style="display:none;">
                <dt id="othercat" style="display:none;">Graph:</dt>
                <dt id="kitcat" style="display:none;">Standard Curve:</dt>
                <dd>
                 <input name="standard_curve" id="upload_curve"  class="form-control" type="text"><a href="#" class="choose-button upload_curve"><img alt="" src="<?php echo base_url('images') ?>/add-file.png" height="18" width="18"> Choose File</a>
            
                </dd>
                </div>
                
                <div id="disclaimer" style="display:none;">
                <dt>Disclaimer:</dt>
                <dd>
                  <input name="disclaimer"  class="form-control" type="text">
                </dd>
                </div>
               
                <div id="host" style="display:none;">
                 <dt>Host:</dt>
                <dd>
                  <input name="host"  class="form-control" type="text">
                </dd>
                
                </div>
                <div id="radioact" style="display:none;">
                 <dt>Host:</dt>
                <dd>
                  <input name="radioactivity"  class="form-control" type="text">
                </dd>
                
                </div>
              </dl>
            </div>
          </div>
          <div class="col-sm-6">
            <h4><strong>Species</strong></h4>
            <div class="row product-checkboxes">
           <div>
		   <?php foreach($species as $spec) { ?>
               <span class="col-md-6">  
                <p>
                  <label class="label-check" for="spec_<?php echo $spec['id'] ?>">
                    <input id="spec_<?php echo $spec['id'] ?>" class="checkbox" name="species[]" type="checkbox" value="<?php echo $spec['id'] ?>">
                    <?php echo $spec['name']; ?></label>
                </p>
                </span>
               <?php } ?>
               </div> 
            </div>
            <h4><strong>Category</strong></h4>
            <div class="row product-checkboxes">
             
              
              <div>   
              <?php foreach($catlist as $cat) { ?>
                <span class="col-md-6">
                <p>
                  <label class="label-check" for="cat_<?php echo $cat['cat_id'] ?>">
                    <input id="cat_<?php echo $cat['cat_id'] ?>" class="checkbox catcheck" name="category[]" type="checkbox" value="<?php echo $cat['cat_id'] ?>">
                    <?php echo $cat['title']; ?></label>
                </p>
                 </span>
               <?php } ?>  
             </div>
              
             
            </div>
            <h4><strong>Subcategory</strong></h4>
            <div class="row product-checkboxes">
              
              <div id="subcats">
               <?php /*?> <?php foreach($subcatlist as $subcat) { ?>
                <span class="col-md-6">
                <p>
                  <label class="label-check" for="subcat_<?php echo $subcat['sub_cat_id'] ?>">
                    <input id="subcat_<?php echo $subcat['sub_cat_id'] ?>" name="sub_category[]" value="<?php echo $subcat['sub_cat_id'] ?>" type="checkbox">
                    <?php echo $subcat['sub_title'] ?></label>
                </p>
                </span>
                <?php } ?><?php */?>
                
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <dl class="dl-horizontal">
          <div id="cross_reactivity" style="display:none">
            <dt>Cross Reactivity:</dt>
                <dd>
                  <textarea name="cross_reactivity"  class="form-control"></textarea>
                </dd>
                </div>
            <dt>Sequence:</dt>
                <dd class="formerrorvalid">
              <textarea name="sequence" class="form-control"></textarea>
                </dd>
            <dt>Storage Condition:</dt>
            <dd class="formerrorvalid">
              <textarea name="storage_conditions" class="form-control"></textarea>
            </dd>
            <dt>Content:</dt>
            <dd class="formerrorvalid">
              <textarea name="contents" class="form-control"></textarea>
            </dd>
            <dt>Reference:</dt>
            <dd class="formerrorvalid">
              <textarea name="reference" class="form-control"></textarea>
            </dd class="formerrorvalid">
            <dt>Comments:</dt>
            <dd>
              <textarea name="comment" class="form-control"></textarea>
            </dd>
            <dt style="padding-top: 7px;">MSDS:</dt>
            <dd>
            <input type="text" readonly="readonly" name="msds" id="reci_image" />
            <a href="#" class="choose-button upload_img"><img alt="" src="<?php echo base_url('images') ?>/add-file.png" height="18" width="18"> Choose File</a></dd>
            <div id="tracer" style="display:none">
            <dt>Tracer:</dt>
            <dd>
              <input name="tracer"  class="form-control" type="text">
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
        $('body').on('click','.label-check',function(){
          
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
			
			
		
		$.ajax({
          
		  url:"<?php echo base_url(); ?>admin/products/getSubcats",
          
		  type:"post",
          
		   data:{
       
           'cat_id':newid
           }
                ,
           success:function(data){
                
                tags=JSON.parse(data);
                newtags=[];
                if(tags.length>0){
                for(var i=0; i<tags.length; i++){
                    
               var subcat= '<span class="col-md-6 '+id+'"><p><label class="label-check" for="subcat_'+tags[i]['sub_cat_id']+'"><input id="subcat_'+tags[i]['sub_cat_id']+'" name="sub_category[]" value="'+tags[i]['sub_cat_id']+'" type="checkbox" class="subcatcheck checkbox">'+tags[i]['sub_title']+'</label></p></span>';
                 
				 
				 $('#subcats').append(subcat);   
                }
				         
				}
          
		   }
		   
		   
       
       });
			
			
			
			
				 
				 }
				 
				 else {
					 
				$('#molecular_weight').hide();
				$('#solubility').hide();
				$('#appearance').hide();
				$('#purity').hide();
				$('#standard_curve').hide();
				$('#othercat').hide();
				
			
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
