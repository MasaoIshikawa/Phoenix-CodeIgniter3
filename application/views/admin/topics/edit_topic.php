<script type="text/javascript" src="<?php echo base_url()?>js/tiny_mce_new/tiny_mce.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/tiny_mce_new/init_tiny.js"></script>
<div id="page-body" class="clearfix">
  <?php $this->load->view('admin/left-menu'); ?>	<!-- end left menu -->

    <!-- end left menu -->
    
    <div id="right-contents"> 
      <!--page title -->
      <div class="page-title clearfix">
        <h1 class="pull-left">Add/Edit a Topic</h1>
      </div>
      <!--/page title -->
      <?php $topic=$topicdata['topic']; ?>
      <form method="post" id="file_upload" style="display:none;">
            <input type="file" accept="image/*" class="upload signin long_btn" name="file" >
        </form>
      <div class="table-content add-topics">
        <form id="addtopic_form" method="post" action="<?php echo base_url('admin/topics/updatetopic/'.$topic['topic_id']) ?>">
          <dl class="dl-horizontal">
            <dt>Category</dt>
            <dd>
              <select class="form-control" name="topic_cat">
               <?php foreach($catlist as $row) { ?> <option <?php if($row['cat_id']==$topic['topic_cat_id'])echo 'selected=selected'; ?> value="<?php echo $row['cat_id']; ?>"><?php echo $row['title']; ?></option><?php } ?>
              </select>
            </dd>
            
            <dt>Title</dt>
            <dd class="formerrorvalid">
              <p>
                <input name="title" value="<?php echo $topic['topic_title']; ?>" class="form-control validate[required]">
              </p>
              </dd>
               <dt>Summery</dt>
            <dd class="formerrorvalid">
              <p>
                <input name="summery" value="<?php echo $topic['summery']; ?>" class="form-control validate[required]">
              </p>
              </dd>
            <dt>Related Products</dt>
            <dd>
              <p>
              <input id="automain" class="form-control">
                 <p id="mainerror" style="color:red; display:none;"> Main tag doesn't match your input, please try typing something else. </p> 
              </p>
              <div class="product-section clearfix" id="productsection">
               <?php foreach($topicproducts as $trow) { ?>
                <div class="related-products" id="product_<?php echo $trow['selec_product_id'] ?>"><input type="hidden" value="<?php echo $trow['selec_product_id'] ?>" name="selected_products[]" /><p class="plist"><?php echo $trow['product_name'] ?></p><a class="selectedproducts" id="<?php echo $trow['selec_product_id'] ?>" href="#"><img src="<?php echo base_url() ?>images/product-close.png" width="17" height="17" alt=""></a></div>
                
               <?php } ?>
                
              </div>
            </dd>
            <?php foreach($topicdata['topic_questions'] as $qrow) { ?>
            <div class="steps"><dd><span class="step_holder"></span><a href="javascript:;" onclick="removeInfo(this);" class="remove_link pull-right">X</a></dd>
            <dt>Question</dt>
            <dd class="formerrorvalid">
              <input name="question[]"  value="<?php echo  $qrow['question']; ?>"class="form-control validate[required]">
            </dd>
            <dt>Answer</dt>
            <dd class="formerrorvalid">
              <textarea name="answer[]" class="form-control validate[required]"><?php echo $qrow['answer']; ?></textarea>
            </dd>
            </div>
            <?php } ?>
            <div class="addinfo"></div>
            <dd>
            <div class="add-questions"><a href="javascript:void(0)" onclick="addinfo();">Add More Questions</a></div>
            </dd>
            <dt>Text Controller</dt>
            <dd>
              <textarea name="description" class="form-control"><?php echo $topic['description'] ?></textarea>
            </dd>
            <dt>Images</dt>
            <?php if(empty($topic['image'])) {
				$topicimage='images/topic-upload-img.png';
				}
				else {
					
					$topicimage='uploads/icons/'.$topic['image'];
					}
				 ?>
            <dd><a href="javascript:void(0)" class="uploadtpim"><img id="profileim" src="<?php echo base_url($topicimage); ?>" width="155" height="97" alt=""></a>
            <input type="hidden" value="<?php echo $topic['image']; ?>" id="topicimg" name="image" />
            </dd>
          </dl>
          <div class="text-right">
            <button class="link-btn grey" onclick="javascript:window.location.href='<?php echo site_url('admin/topics/topicslist');?>'" type="reset">Cancel</button> 
            <button class="link-btn green" type="submit">Save</button>
          </div>
        </form>
      </div>
      <!-- end table area --> 
    </div>
    <!-- end right contents --> 
  </div>
  <script type="text/javascript">
$(function(){
$('form select').customSelect();
$( window ).resize(function() {
	var customWidth = $('span.customSelect').innerWidth();
	$('select.hasCustomSelect').css('width', customWidth + 'px');
});
});

function addinfo(){
		$('.addinfo').append(<?php echo json_encode('<div class="steps"><dd><span class="step_holder"></span><a href="javascript:;" onclick="removeInfo(this);" class="remove_link pull-right">X</a></dd><dt>Question</dt>
            <dd>
              <input name="question[]" class="form-control validate[required]">
            </dd>
            <dt>Answer</dt>
            <dd>
              <textarea name="answer[]" class="form-control validate[required]"></textarea>
            </dd></div>'); ?>);
		var i=1;
		$('.step_holder').each(function(index, element) {
           // $(this).html(i);
			//i++;
        });
	}
	
	function removeInfo(anchor_tag){
		$(anchor_tag).parents('.steps').remove();
		var i=1;
		$('.step_holder').each(function(index, element) {
           // $(this).html(i);
			//i++;
        });
	}
	
	$('.uploadtpim').click(function() {
        
		    $('.upload').click();
			
	});
        
		 $(document).ready(function(e) {
			$('#file_upload').fileupload({
			url: '<?php echo base_url('admin/topics/addprofile_img'); ?>',
			dataType: 'json',
			done: function (e, data) {				
				$('#topicimg').val(data._response.result[1]);
				$('#profileim').attr("src", data._response.result[0]);
				
			}
		});
	});
$(document).ready(function(e) {
			 
			
			$('body').on('click','#ui-id-1',function() {
		  
		   $('#automain').val('');
		   }); 
			 
			 $('body').on('click', '.selectedproducts', function(){

				 var id = $(this).attr('id');
				 
				 $('#product_'+id).remove();
				 return false;
				 
				 });
			 var typingTimer;
			 
			 var productarr=[];
		
		
		 $('#automain').keydown(function(e){
      keypressed=e.keyCode || e.which;
      if(keypressed!=9){
        clearTimeout(typingTimer);
        $('#maintaghidden').val('');
         $('#secondtag').hide();
         $('#primtaghidden').val('')
         $('#autosub').val('');
         $('#autoprim').val('');
          $('#alternativetag').hide();
          subtags=[];
       
		 $('#mainloader').show();
         $('#mainerror').hide();
 typingTimer = setTimeout(function(){
		$('#automain').autocomplete({
       
            source:function(request, response){
             $.ajax({
          url:"<?php echo base_url(); ?>admin/topics/getProducts",
          type:"post",
           data:{
       
           'tag_name':request.term
           }
                ,
           success:function(data){
                $('#mainloader').hide();
                tags=JSON.parse(data);
                newtags=[];
                if(tags.length>0){
                for(var i=0; i<tags.length; i++){
                    
                    newtags.push(tags[i]['product_name']);
                }
				         
               
                console.log(newtags);
                response(newtags);
                } else {
                    $('#mainerror').show();
                    $('#mainerror').val('');
                    $('#mainerror').trigger('keydown');
                }
            
           },
           
       
       });  
            
            
            },
            
            select:function(event, ui){
                var selected= ui.item.label;
                for(var i=0; i<tags.length; i++){
                 if(tags[i]['product_name']==selected){
					productarr.push(tags[i]['product_name']);
					var html='<div class="related-products" id="product_'+tags[i]['p_id']+'"><input type="hidden" value="'+tags[i]['p_id']+'" name="selected_products[]" />'+tags[i]['product_name']+'<a href="#" class="selectedproducts" id="'+tags[i]['p_id']+'"><img src="<?php echo base_url() ?>images/product-close.png" width="17" height="17" alt=""></a></div>';
					
					 $('#productsection').append(html);
                  // $('#maintaghidden').val(tags[i]['p_id']);  
                    $('#automain').val();
					clearTimeout(typingTimer);
                   
                 }
                }
            }
        
        });

          },100);
      }
        });
        
	});
</script>
