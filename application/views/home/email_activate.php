<script type="text/javascript">
	 $(document).ready(function(e) {
	   $.validator.addMethod("specialChar", function(value, element) {
     return this.optional(element) || /([0-9a-zA-Z\s])$/.test(value);
  }, "Please Fill Correct Value in Field.");  	
	
       $("#resend_key_frm").validate();     			
    });
	
	
</script>

<div id="page-body">
  <div class="container">
    <div class="row">
      <div class="span12">
       <div id="loginPop1">
          <div id="popover">
            <div class="popup_header clearfix">
              <h1 class="pull-left">Account Varification</h1>
             </div>
            <!--end ppheader-->
            
            <div class="popup_content">
              <form class="header-form clearfix" method="post" id="resend_key_frm" name="resend_key_frm">
              <?php if($error){?>
                <div class="alert alert-error signin_error" style="animation:cubic-bezier(4,5,4,5); display:block;">Account activation failed, Invalid data supplied.</div>
               <?php } else{?>
                <div class="alert alert-success  signin_suc" style="display:block;">Account has been activated successfully.</div>
              
                
              <?php }?>
              
                <div class="text-right">
                  <input name="" type="button" class="custom-btn" value="Close" onclick="window.location.href='<?php echo base_url('signin');?>'" >
                </div>
              </form>
            </div>
          </div>
        </div>
             
      </div>
    </div>
  </div>
</div>
