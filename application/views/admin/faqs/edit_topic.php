<script type="text/javascript" src="<?php echo base_url()?>js/tiny_mce_new/tiny_mce.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/tiny_mce_new/init_tiny.js"></script>
<div id="page-body" class="clearfix">
  <?php $this->load->view('admin/left-menu'); ?>	<!-- end left menu -->

    <!-- end left menu -->
    
    <div id="right-contents"> 
      <!--page title -->
      <div class="page-title clearfix">
        <h1 class="pull-left">Add/Edit a Question</h1>
      </div>
      <!--/page title -->
      
     
      <div class="table-content add-topics">
        <form id="addtopic_form" method="post" action="<?php echo base_url('admin/faqs/updatequestion/'.$topic['faq_id']) ?>">
          <dl class="dl-horizontal">
            <dt>Topic</dt>
            <dd>
              <select class="form-control" name="topic_cat">
               <?php foreach($catlist as $row) { ?> <option <?php if($row['id']==$topic['topic_id'])echo 'selected=selected'; ?> value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option><?php } ?>
              </select>
            </dd>
            
            
            
            
            <dt>Question</dt>
            <dd>
              <input name="question"  value="<?php echo  $topic['question']; ?>"class="form-control validate[required]">
            </dd>
            <dt>Answer</dt>
            <dd>
              <textarea name="answer" class="form-control validate[required]"><?php echo $topic['answer']; ?></textarea>
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

</script>
