 <script>
 $(document).ready(function(){
	 $('.topics_view').hide();
	 $('#topic_0').show();
	 
	 $('.tabs').click(function(){
		 
		 var id = $(this).attr('id');
		 $('.topics_view').hide();
		  $('.active').removeClass( "active" );
		 $('#lics'+id).addClass( "active" );
		 $('#topic_'+id).show();
		 });
	 
	 
	 });
 </script>
  <div id="page-body">
    <div class="container category-content">
      <div class="topic-title">
        <?php  foreach($topicsdata['topics'] as $cat) { ?><h4><img alt="" src="<?php echo base_url('uploads/icons'); ?>/<?php echo $cat['icon']?>"><?php  echo $cat['title']; ?></h4><?php break; } ?>
      </div>
      <div class="content-inner">
        <ul class="nav-justified category-tabs">
          <?php $i=0; foreach($topicsdata['topics'] as $row) { ?>
          <li <?php if($i==0) { ?>class="active" <?php } ?> id="lics<?php echo $i; ?>"><a id="<?php echo $i; ?>" class="tabs" href="javascript:void(0)"><?php echo $row['topic_title'] ?></a></li>
          <?php $i++; } ?>
         
        </ul
>
      </div>
      
      <!--/tabs -->
      <?php $j=0; foreach($topicsdata['topics'] as $topic) { ?>
      <div id="topic_<?php echo $j; ?>" class="topics_view">
      <h3><?php echo $topic['summery']; ?></h3>
      <h4>Related Products</h4>
      <div class="table-responsive related-products-table">
        <table>
         
          <tr>
         <?php foreach($topicsdata['topic_products'][$topic['topic_id']] as $products) { ?>
            <td><a href="<?php echo base_url('products/view/'.$products['slug'].'/'.$products['catalog']) ?>"><?php echo $products['product_name']; ?></a></td>
            <?php } ?>
          </tr>
        </table>
      </div>
      
      <!--/table -->
      <p><?php echo $topic['description']; ?></p>
      <!--<h4>The Role of Incretins in Glucose Homeostasis and Diabetes Treatment</h4>
      <p>Insulin levels is reduced and became a central issue in the development of T2DM. Incretins or DPP4 inhibitor improve the insulin release
        from pancreas. </p>
      <p><img src="<?php echo base_url('images/home'); ?>/diabetes-img1.jpg" alt="" class="img-responsive aligncenter"></p>
      <p><i>Shemtic Representation of incretin secretion and action. GIP and GLP-1 are secreted after food ingestion, and they then simulate 
        glucose-dependent insulin secrection. Once released, GIP and GLP-1 are subject to degradation by DPP4 on lymphocytes and on endothelial cells
        of blod vesseals. The red cells in the islets are insulin-containing (β) cells and the green cells are glucagon-containing (α) cells.</i></p>
      <p>Glucose is transported into pancreatic β-cells by facilitated diffusion. High levels of intracellular glucose in pancreatic β-cells also 
        stimulates Ca2+-independent pathways that further increase insulin secretion. Binding of GLP-1 to its receptor promotes insulin release
        via intermediates such as PKB, and also increases  β-cell mass via improved cell survival and decreased apoptosis.</p>
      <p><img src="<?php echo base_url('images/home'); ?>/diabetes-img2.jpg" alt="" class="img-responsive aligncenter"></p>
      <p>Post-translational processing of proglucagon in the intestinal L cell and the pancreatic α cell. PC1/3 is responsible for the processing of 
        proglucagon in the L cell to release GLP-1 and GLP-2.</p>
      <p class="text-orange"><i>Kim W, Egan JM. Pharmacol Rev. 2008 Dec;60(4):470-512. Epub 2008 Dec 12.</i></p>
      <h4>Clinical Stages of Type 2 Diabetes</h4>
      <p><img src="<?php echo base_url('images/home'); ?>/diabetes-img3.jpg" alt="" class="img-responsive aligncenter"></p>
      <p>Insulin resistance—a state in which the capacity of target cells to respond to normal insulin levels is reduced—has a central role in the development of T2DM. Inducers of insulin resistance act, at least in part, by activating various serine/threonine protein kinases that phosphorylate IRS proteins as well as other components of the insulin signalling pathway. In so doing, they exploit negative feedback control mechanisms otherwise utilized by insulin itself to terminate insulin signal transduction. Phosphorylation of IRS proteins inhibits their function and interferes with insulin signalling in a number of ways, leading to the development of an insulin-resistant state.</p>-->
      <div class="accordion-area">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php foreach($topicsdata['topic_questions'][$topic['topic_id']] as $question) { ?>
          <div class="panel">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $question['question_id'];  ?>" aria-expanded="true" aria-controls="collapseOne"><?php echo  $question['question'] ?></a> </h4>
            </div>
            <div id="<?php echo $question['question_id'];  ?>" style="display" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body"> 
               <?php echo $question['answer']; ?>
              </div>
            </div>
            <p class="text-orange">Greulich S, Chen WJ, Maxhera B, et al. PLoS One. 2013;8(3):e59697. doi: 10.1371/journal.pone.0059697. Epub 2013 Mar 29.</p>
          </div>
          <?php } ?>
          
          
         
        </div>
      </div>
      <!--accordion -->
      
      
      <p><img src="<?php echo base_url('uploads/icons'); ?>/<?php echo $row['image'] ?>" alt="" class="img-responsive aligncenter"></p>
      
      
      </div>
     <?php $j++; } ?> 
      <!-- end content --> 
      
    </div>
  </div>
