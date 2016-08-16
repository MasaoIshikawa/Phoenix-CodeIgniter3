   <div style="min-height: 10px;" id="page-body" class="clearfix">
    <?php $this->load->view('admin/left-menu'); ?>	<!-- end left menu -->

    <!-- end left menu -->
    <?php $topic=$topicdata['topic']; ?>
    <div id="right-contents"> 
      <!--page title -->
      <div class="page-title clearfix">
        <h1 class="pull-left"><?php echo $topic['topic_title']; ?></h1>
      </div>
      <!--/page title -->
      
      <div class="table-content add-topics view-topics">
      
          <dl class="dl-horizontal">
            <dt>Category</dt>
            <dd>
             <?php foreach($catlist as $row) { ?> <?php if($row['cat_id']==$topic['topic_cat_id']){  echo $row['title']; } ?><?php } ?>
            </dd>
            
            </dl>
            
            
            <div class="product-section clearfix">
             <h3>Related Products</h3>
       
                <div class="related-products">ADM</div>
                <div class="related-products">Amyliln</div>
                <div class="related-products">Augurin</div>
                <div class="related-products">Beatatrophin</div>
                <div class="related-products">C-peptide</div>
                <div class="related-products">Exendin</div>
                
                <div class="related-products">Insulin</div>
                <div class="related-products">Intermedin</div>
                <div class="related-products">NERP-2</div>
                <div class="related-products">Neuronostatin</div>
                <div class="related-products">NPY</div>
                <div class="related-products">Oxyntomodulin</div>
         
            
            </div>
            
            
            
            
            <dl class="dl-horizontal">
           <?php foreach($topicdata['topic_questions'] as $qrow) { ?>
            <dt>Question</dt>
            <dd>
             <?php echo  $qrow['question']; ?>
            </dd>
            <dt>Answer</dt>
            <dd>
              <?php echo $qrow['answer']; ?>
            </dd>
            <?php } ?>
            <dt>Text Controller</dt>
            <dd>
             <?php echo $topic['description']; ?>
            </dd>
            <dt>Images</dt>
            <dd><img src="<?php echo base_url('uploads/icons/'.$topic['image']) ?>" alt="" height="106" width="152"></dd>
          </dl>
          <div class="text-right">
            <button class="link-btn grey" onclick="javascript:window.location.href='<?php echo site_url('admin/topics/topicslist');?>'" type="submit">Cancel</button> <button onclick="javascript:window.location.href='<?php echo site_url('admin/topics/edit/'.$topic['topic_id']);?>'" class="link-btn green" type="submit">Edit</button>
          </div>
       
      </div>
      <!-- end table area --> 
    </div>
    <!-- end right contents --> 
  </div>
