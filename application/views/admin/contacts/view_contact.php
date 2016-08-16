<div id="page-body" class="clearfix">
<?php $this->load->view('admin/left-menu'); ?>
    <!-- end left menu -->
    
    <div id="right-contents"> 
      <!--page title -->
      <div class="page-title clearfix">
        <h1 class="pull-left">View Contact Detail</h1>
      </div>
      <!--/page title -->
      
      <div class="view-contact add-form"> 
      <div class="view-contact add-form"> 
      <dl class="dl-horizontal">


        <dt>Message Date</dt>
        <dd><?php echo $contact['date']; ?></dd>
        
        <dt>Name</dt>
        <dd><?php echo $contact['first_name']." ".$contact['last_name']; ?></dd>
        <dt>Email</dt>
        <dd><?php echo $contact['email']; ?></dd>
       
	   
	   <?php if($contact['type']=='support') { ?>
       <dt>Request Name</dt>
        <dd><?php echo $contact['request_name']; ?></dd>
        <dt>Order Number</dt>
        <dd><?php echo $contact['order_number']; ?></dd>
       <dt>Priority</dt>
        <dd><?php echo $contact['priority']; ?></dd>
       
       
	   <?php } ?>
        <dt>Question</dt>
        <dd><?php echo $contact['message']; ?></dd>
        
      
      <?php if($contact['type']=='catalog') { ?>
       <dt>Company Name</dt>
        <dd><?php echo $catalog['company_name']; ?></dd>
        <dt>Street Address</dt>
        <dd><?php echo $catalog['street']; ?></dd>
       <dt>Building/Room</dt>
        <dd><?php echo $catalog['billing']; ?></dd>
       
       <dt>City</dt>
        <dd><?php echo $catalog['city']; ?></dd>
       <dt>Zip</dt>
        <dd><?php echo $catalog['zip']; ?></dd>
        <dt>State</dt>
        <dd><?php echo $catalog['state']; ?></dd>
        <dt>Country</dt>
        <dd><?php echo $catalog['country']; ?></dd>
       
       
       
       
	   <?php } ?>
      
      <?php if($contact['type']=='survy') { ?>
       <dt>Customer Type</dt>
        <dd><?php echo '  '; $customerinfo=unserialize($surveydata['customer_type']);
		for($i=0;$i<count($customerinfo);$i++) {
			
			echo $customerinfo[$i].', ';
			} 
		 ?></dd>
        <dt>Occupation</dt>
        <dd><?php echo '  '.$surveydata['occupation']; ?></dd>
       <dt>Which category of products are you interested in ?  </dt>
        <dd><?php echo '  '; $products_categories=unserialize($surveydata['products_categories']);
		for($i=0;$i<count($products_categories);$i++) {
			
			echo $products_categories[$i].', ';
			} 
		 ?></dd>
       
       <dt>Have you placed any orders from us within the past 2 years ?  </dt>
        <dd><?php echo '  '.$surveydata['order_placed']; ?></dd>
       
       <dt>Have you ever contacted our customer service support ?</dt>
        <dd><?php echo '  '.$surveydata['contact_customer_service']; ?></dd>
       
       <dt>Did you find the product or information you were looking for on our website ?  </dt>
        <dd><?php echo '  '.$surveydata['desired_product']; ?></dd>
       
       <dt>How would you rate our search engine: ?</dt>
        <dd><?php echo '  '.$surveydata['rate_search_engine']; ?></dd>
       
       <dt>What information would you like to see more of on the website ?  </dt>
        <dd><?php echo '  '; $info=unserialize($surveydata['information_required']); for($i=0;$i<count($info);$i++) {
			
			echo $info[$i].', ';
			} ?></dd>
       
       <dt>After searching for your product and clicking on the item, did you use our "More information" tab ?  </dt>
        <dd><?php echo '  '.$surveydata['use_more_information']; ?></dd>
        <dt>Overall website quality:  </dt>
        <dd><?php echo '  '. $surveydata['website_quality']; ?></dd>
       
       
	   <?php } ?>
       </dl>
        <p class="text-left"> <a href="<?php echo base_url('admin/contacts'); ?>" class="link-btn grey">Back</a> <a href="<?php echo base_url('admin/contacts/reply/'.$contact['contact_id']); ?>" class="link-btn green">Reply</a> <a href="<?php echo base_url('admin/contacts/delete/'.$contact['contact_id']); ?>" class="link-btn red">Remove</a> </p>
      </div>
      <!-- end view contact --> 
      
      <!--page title -->
      <div class="page-title clearfix">
        <h1 class="pull-left">Contact History</h1>
      </div>
      <!--/page title -->
      
      <div class="table-content table-condensed">
        <div class="table-responsive">
          <table>
            <tr>
              <th>Date</th>
              <th>Name</th>
              <th>Subject</th>
             
              <th>Email</th>
              <th class="text-center">Actions</th>
            </tr>
            <?php foreach($replys as $reply) { $i=$reply['contact_id']; ?>
            <tr>
              <td><?php echo $reply['date']; ?></td>
              <td><?php echo $reply['first_name']." ".$reply['last_name']; ?></td>
              <td><?php echo $reply['subject']; ?></td>
              
              <td><?php echo $reply['email']; ?></td>
              <?php $contact=$reply; ?>
             <td class="actions text-center">
<div class="action-pops"><a href="<?php echo base_url('admin/contacts/view/'.$contact['contact_id']); ?>" title="view"><img src="<?php echo base_url('images/admin'); ?>/view-icon.png" alt="view"></a></div>
<div class="action-pops"><a href="<?php echo base_url('admin/contacts/reply/'.$contact['contact_id']); ?>" title="reply"><img src="<?php echo base_url('images/admin'); ?>/reply-icon.png" alt="reply"></a></div>
<div class="action-pops"><a href="javascript:void(0);" onClick="$('#<?php echo $i; ?>').show();" title="remove"><img src="<?php echo base_url('images/admin'); ?>/remove-icon.png" alt="remove"></a>
  <div id="<?php echo $i; ?>" class="inline-popup" style="display:none;">
                <p>Are you sure you want to do this? <span>This action is not reversible</span><span> <button onClick="window.location='<?php echo base_url('admin/contacts/delete_history/'.$i); ?>'" class="link-btn grey">Yes</button> <button onClick="$('#<?php echo $i; ?>').hide();" class="link-btn grey">No</button></span></p>
  </div>
</td>
            </tr>
        <?php } ?>
          </table>
        </div>
      </div>
      <!-- end table area --> 
      
    </div>
    <!-- end right contents --> 
  </div>
