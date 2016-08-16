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
              <h1 class="pull-left">Resend Activation Link</h1>
             </div>
            <!--end ppheader-->
            
            <div class="popup_content">
              <form class="header-form clearfix" method="post" id="resend_key_frm" name="resend_key_frm">
              <?php if($error){?>
                <div class="alert alert-error signin_error" style="animation:cubic-bezier(4,5,4,5); display:block;">Email ID not found.</div>
               <? } if($success == 'success'){?>
                <div class="alert alert-success  signin_suc" style="display:block;">Activtion link has been sent successfully.Please check your inbox.</div>
                <? }?>
                <p>
                  <label><strong>Email Address:</strong></label>
                  <input name="email" id="email" type="text" class="input_field required email">
                </p>
                
                <div class="text-right">
                  <input name="" type="button" class="custom-btn" value="Close" onclick="window.location.href='<?php echo base_url('home');?>'" >
                  &nbsp;&nbsp;
                  <input name="" type="submit" class="custom-btn" value="Resend">
                </div>
              </form>
            </div>
          </div>
        </div>
             
      </div>
    </div>
  </div>
</div>
