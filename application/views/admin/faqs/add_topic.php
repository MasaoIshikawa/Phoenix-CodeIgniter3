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
      <form method="post" id="file_upload" style="display:none;">
            <input type="file" accept="image/*" class="upload signin long_btn" name="file" >
        </form>
      <div class="table-content add-topics">
        <form id="addtopic_form" method="post" action="<?php echo base_url('admin/faqs/savetopic') ?>">
          <dl class="dl-horizontal">
            <dt>Category</dt>
            <dd>
              <select class="form-control" name="topic_cat">
               <?php foreach($catlist as $row) { ?> <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option><?php } ?>
              </select>
            </dd>
            
            <dt>Question</dt>
            <dd>
              <input name="question[]" class="form-control validate[required]">
            </dd>
            <dt>Answer</dt>
            <dd>
              <textarea name="answer[]" class="form-control validate[required]"></textarea>
            </dd>
            <div class="addinfo"></div>
            <dd>
            <div class="add-questions"><a href="javascript:void(0)" onclick="addinfo();">Add More Questions</a></div>
            </dd>
          </dl>
          <div class="text-right">
            <button class="link-btn grey" onclick="javascript:window.location.href='<?php echo site_url('admin/faqs/faqlist');?>'" type="reset">Cancel</button> 
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
</script>

		
		}
</script>
