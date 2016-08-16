 
 <?php if($this->session->flashdata('contact_support_confirmation')==TRUE) { ?>
	<div id="contactus-confirmation" class="popup-outer">
<div class="container">
<div class="col-sm-4 margin-auto">
<div class="popup-content text-center">
<div class="text-right"><a href="javascript:void(0);" onClick="$('#contactus-confirmation').hide();" class="button-close"><img src="<?php echo base_url('images/home/close.gif'); ?>" width="22" height="22" alt=""></a></div>
<p><?php echo $this->session->flashdata('contact_support_confirmation');  ?></p>
</div>
</div>
</div>
</div>
<?php } ?>
 <div id="page-body">
   
    <div class="container">
      <h1 class="page-title clearfix"><?php echo $content['title']; ?></h1>
     
      <div class="content-inner">
        <p><?php echo $content['data']; ?></p>
		<p id="googlfm"><?php $string1=str_replace('&lt;','<',$embdcode);
			echo $string2=str_replace('&gt;','>',$string1) ?>
 </p>
     <?php /*?> <form method="post" id="survy_form" action="<?php echo base_url('support/save_survy_form') ?>">
       <div id="page1" class="pages">
        
          <div class="row customer-satisfaction-survey">
            <div class="col-sm-6">
              <p class="text-orange">* Required</p>
              <p>
                <input type="text" name="name" placeholder="Your Name" class="form-control validate[required]">
              </p>
              <p>
                <input type="text" name="email" placeholder="Your Email Address" class="form-control validate[required,custom[email]]">
              </p>
            </div>
            <div class="col-sm-6">
              <h4>Customer Type *</h4>
              <div class="clearfix">
              <div class="label-area">
              <label class="label-check" for="checkbox-01">
                <input type="checkbox" name="customer_type[]" value="Academic" class="checkbox" id="checkbox-01">
                Academic </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-02">
                <input type="checkbox"  name="customer_type[]" value="Private Laboratory" class="checkbox" id="checkbox-02">
                Private Laboratory </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-03">
                <input type="checkbox" name="customer_type[]" value="Government" class="checkbox" id="checkbox-03">
                Government </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-04">
                <input type="checkbox" name="customer_type[]" value="Reseller / Distributor" class="checkbox" id="checkbox-04">
                Reseller / Distributor </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-05">
                <input type="checkbox" name="customer_type[]" value="Hospital" class="checkbox" id="checkbox-05">
                Hospital </label>
                </div>
              <div class="label-area">
              <label class="label-check" for="checkbox-07">
                <input type="checkbox" name="customer_type[]" value="Pharaceutical" class="checkbox" id="checkbox-07">
                Pharaceutical </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-06">
                <input type="checkbox" name="customer_type[]" class="checkbox" id="checkbox-06">
                Other:
              </label>
              <input type="text" id="check6">
              </div>
              
                </div>
              <p class="button-form text-right">
               <a href="javascript:void(0)" class="link-btn orange" onclick="firstpage()" >Continue</a>
               
              </p>
            </div>
          </div>
        
        
        </div>
        
        <!-- -------------- page no 2  ------------------->
        <div id="page2" class="pages">
        
        
          <div class="row customer-satisfaction-survey">
            <div class="col-sm-12">
              <h4>Occupation*</h4>
              <div class="clearfix">
              <div class="label-area">
              <label class="label-check" for="checkbox-08">
                <input type="radio" name="occupation" value="Scientist" class="checkbox hide-radio" id="checkbox-08">
                Scientist </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-09">
                <input type="radio" name="occupation" value="Researcher" class="checkbox hide-radio" id="checkbox-09">
                Researcher </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-10">
                <input type="radio" name="occupation" value="Doctor" class="checkbox hide-radio" id="checkbox-10">
                Doctor </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-11">
                <input type="radio" name="occupation" value="Student" class="checkbox hide-radio" id="checkbox-11">
                Student </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-12">
                <input type="radio" name="occupation" value="Purchaser" class="checkbox hide-radio" id="checkbox-12">
                Purchaser </label>
                </div>
                
              <div class="label-area">
              <label class="label-check" for="checkbox-13">
                <input type="radio"  name="occupation" value="Professor" class="checkbox hide-radio" id="checkbox-13">
                Professor </label>
                </div>
                </div>
              <p class="button-form text-right">
              <a href="javascript:void(0)" class="link-btn orange" onclick="$('.pages').hide(); $('#page1').show();">Back</a> 
                <a href="javascript:void(0)" class="link-btn orange" onclick="if($('#survy_form').validationEngine('validate')) { $('.pages').hide(); $('#page3').show(); }">Continue</a> 
              </p>
            </div>
          </div>
        
        
        </div>
        
         <!-- -------------- page no 3  ------------------->
         
        <div id="page3" class="pages">
        
        
          <div class="row customer-satisfaction-survey">
            <div class="col-sm-12">
              <h4>Which category of products are you interested in? *</h4>
              <div class="clearfix">
              <div class="label-area">
              <label class="label-check" for="checkbox-14">
                <input type="checkbox" name="products_categories[]" value="Anti-Cancer" class="checkbox" id="checkbox-14">
                Anti-Cancer </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-15">
                <input type="checkbox" name="products_categories[]" value="Anti-Microbial" class="checkbox" id="checkbox-15">
                Anti-Microbial </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-16">
                <input type="checkbox" name="products_categories[]" value="Cardiovascular" class="checkbox" id="checkbox-16">
                Cardiovascular </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-17">
                <input type="checkbox" name="products_categories[]" value="Diabetes" class="checkbox" id="checkbox-17">
                Diabetes </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-18">
                <input type="checkbox" name="products_categories[]" value="Obesity" class="checkbox" id="checkbox-18">
                Obesity </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-19">
                <input type="checkbox" name="products_categories[]" class="checkbox" id="checkbox-19">
                Other:
              </label>
              <input type="text" id="check19">
              </div>
              <div class="label-area">
              <label class="label-check" for="checkbox-20">
                <input type="checkbox" name="products_categories[]" value="Pharaceutical" class="checkbox" id="checkbox-20">
                Pharaceutical </label>
                </div>
                </div>
              <p class="button-form text-right">
              <a href="javascript:void(0)" class="link-btn orange" onclick="$('.pages').hide(); $('#page2').show();">Back</a> 
                <a href="javascript:void(0)" class="link-btn orange" onclick="thirdpage()">Continue</a> 
              </p>
            </div>
          </div>
        
        
        </div>
        
         <!-- -------------- page no 4  ------------------->
         
        <div id="page4" class="pages">
        
          <div class="row customer-satisfaction-survey">
        
            <div class="col-sm-12">
              <h4>Have you placed any orders from us within the past 2 years? *</h4>
              <div class="clearfix">
              <div class="label-area">
              <label class="label-check" for="checkbox-21">
                <input type="radio" name="order_placed" value="Yes" class="checkbox hide-radio" id="checkbox-21">
                Yes </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-22">
                <input type="radio" name="order_placed" value="No" class="checkbox hide-radio" id="checkbox-22">
                No </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-23">
                <input type="radio" name="order_placed" value="I plan to order soon" class="checkbox hide-radio" id="checkbox-23">
                I plan to order soon </label>
                </div>
               
            
            
                </div>
              <p class="button-form text-right">
              <a href="javascript:void(0)" class="link-btn orange" onclick="$('.pages').hide(); $('#page3').show();">Back</a> 
               <a href="javascript:void(0)" class="link-btn orange" onclick="if($('#survy_form').validationEngine('validate')) { $('.pages').hide(); $('#page5').show(); }">Continue</a> 
              </p>
            </div>
          </div>
        
        
        </div>
        
         <!-- -------------- page no 5  ------------------->
        
        <div id="page5" class="pages">
        
          <div class="row customer-satisfaction-survey">
     <div class="col-sm-12">
              <h4> Have you ever contacted our customer service support ? *</h4>
              <div class="clearfix">
              <div class="label-area">
              <label class="label-check" for="checkbox-24">
                <input type="radio" name="contact_customer_service" value="Yes" class="checkbox hide-radio" id="checkbox-24">
                Yes </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-25">
                <input type="radio" name="contact_customer_service" value="No" class="checkbox hide-radio" id="checkbox-25">
                No </label>
                </div>
               
               
            
            
                </div>
              <p class="button-form text-right">
              <a href="javascript:void(0)" class="link-btn orange" onclick="$('.pages').hide(); $('#page4').show();">Back</a> 
                <a href="javascript:void(0)" class="link-btn orange" onclick="if($('#survy_form').validationEngine('validate')) { $('.pages').hide(); $('#page6').show(); } ">Continue</a> 
              </p>
            </div>
          </div>
        
        
        </div>
        
         <!-- -------------- page no 6  ------------------->
        
        <div id="page6" class="pages">
           
          <div class="row customer-satisfaction-survey">
     <div class="col-sm-12">
              <h4> Did you find the product or information you were looking for on our website ? *</h4>
              <div class="clearfix">
              <div class="label-area">
              <label class="label-check" for="checkbox-26">
                <input type="radio" name="desired_product" value="Yes" class="checkbox hide-radio" id="checkbox-26">
                Yes </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-27">
                <input type="radio" name="desired_product" value="No" class="checkbox hide-radio" id="checkbox-27">
                No </label>
                </div>
               
               
            
            
                </div>
              <p class="button-form text-right">
              <a href="javascript:void(0)" class="link-btn orange" onclick="$('.pages').hide(); $('#page5').show();">Back</a> 
                <a href="javascript:void(0)" class="link-btn orange" onclick="if($('#survy_form').validationEngine('validate')) { $('.pages').hide(); $('#page7').show();} ">Continue</a> 
              </p>
            </div>
          </div>
        
        
        </div>
        
         <!-- -------------- page no 7  ------------------->
        
        <div id="page7" class="pages">
        
          <div class="row customer-satisfaction-survey">
     <div class="col-sm-12">
              <h4> How would you rate our search engine: ? *</h4>
              <div class="clearfix">
              <div class="label-area">
              <label class="label-check" for="checkbox-28">
                <input type="radio" name="rate_search_engine" value="Excellent" class="checkbox hide-radio" id="checkbox-28">
                Excellent </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-29">
                <input type="radio" name="rate_search_engine" value="Good" class="checkbox hide-radio" id="checkbox-29">
                Good </label>
                </div>
                  <div class="label-area">
              <label class="label-check" for="checkbox-30">
                <input type="radio" name="rate_search_engine" value="Fair" class="checkbox hide-radio" id="checkbox-30">
                Fair </label>
                </div>
                  <div class="label-area">
              <label class="label-check" for="checkbox-31">
                <input type="radio" name="rate_search_engine" value="Poor" class="checkbox hide-radio" id="checkbox-31">
                Poor </label>
                </div>
                  <div class="label-area">
              <label class="label-check" for="checkbox-32">
                <input type="radio" name="rate_search_engine" value="I did not use your search engine" class="checkbox hide-radio" id="checkbox-32">
                I did not use your search engine </label>
                </div>
               
                </div>
              <p class="button-form text-right">
                <a href="javascript:void(0)" class="link-btn orange" onclick="$('.pages').hide(); $('#page6').show();">Back</a> 
               <a href="javascript:void(0)" class="link-btn orange" onclick="if($('#survy_form').validationEngine('validate')) { $('.pages').hide(); $('#page8').show(); }">Continue</a> 
              </p>
            </div>
          </div>
        
        
        </div>
        
         <!-- -------------- page no 8  ------------------->
        
        
        <div id="page8" class="pages">
        
    
          <div class="row customer-satisfaction-survey">
          
            <div class="col-sm-12">
              <h4>What information would you like to see more of on the website?: *</h4>
              <div class="clearfix">
              <div class="label-area">
              <label class="label-check" for="checkbox-33">
                <input type="checkbox" name="information_required[]" value="Product protocol" class="checkbox" id="checkbox-33">
                Product protocol </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-34">
                <input type="checkbox" name="information_required[]" value="product sequence" class="checkbox" id="checkbox-34">
                product sequence </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-35">
                <input type="checkbox" name="information_required[]" value="product availability" class="checkbox" id="checkbox-35">
                product availability </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-36">
                <input type="checkbox" name="information_required[]" value="cross reactivity / specificity" class="checkbox" id="checkbox-36">
                cross reactivity / specificity </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-37">
                <input type="checkbox" name="information_required[]" value="molecular weight" class="checkbox" id="checkbox-37">
                molecular weight </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-38">
                <input type="checkbox" name="information_required[]" value="antibody staining" class="checkbox" id="checkbox-38">
                antibody staining </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-39">
                <input type="checkbox" name="information_required[]" value="MSDS" class="checkbox" id="checkbox-39">
                MSDS </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-40">
                <input type="checkbox" name="information_required[]" value="Publications that used the product" class="checkbox" id="checkbox-40">
                Publications that used the product </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-41">
                <input type="checkbox" name="information_required[]" value="Purity / HPLC" class="checkbox" id="checkbox-41">
                Purity / HPLC </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-42">
                <input type="checkbox" name="information_required[]" value="Quality control data sheet" class="checkbox" id="checkbox-42">
                Quality control data sheet </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-43">
                <input type="checkbox" name="information_required[]" value="Standard Curve" class="checkbox" id="checkbox-43">
               Standard Curve </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-44">
                <input type="checkbox" name="information_required[]" value="Product references" class="checkbox" id="checkbox-44">
                 Product references </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-45">
                <input type="checkbox" class="checkbox" name="information_required[]" id="checkbox-45">
                Other:
              </label>
              <input type="text" id="check45" >
              </div>
             
                </div>
              <p class="button-form text-right">
              <a href="javascript:void(0)" class="link-btn orange" onclick="$('.pages').hide(); $('#page7').show();">Back</a> 
                <a href="javascript:void(0)" class="link-btn orange" onclick="ninepage()">Continue</a> 
              </p>
            </div>
          </div>
        
        
        </div>
        
         <!-- -------------- page no 9  ------------------->
        
        <div id="page9" class="pages">
        
          <div class="row customer-satisfaction-survey">
             
            <div class="col-sm-12">
              <h4> After searching for your product and clicking on the item, did you use our "More information" tab?  *</h4>
              <div class="clearfix">
              <div class="label-area">
              <label class="label-check" for="checkbox-46">
                <input type="radio" name="use_more_information" value="Yes" class="checkbox hide-radio" id="checkbox-46">
                Yes </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-47">
                <input type="radio" name="use_more_information" value="No" class="checkbox hide-radio" id="checkbox-47">
                No </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-48">
                <input type="radio" name="use_more_information" value="I found everything on the item page" class="checkbox hide-radio" id="checkbox-48">
                I found everything on the item page </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-49">
                <input type="radio" name="use_more_information" value="I did not know there was a More Information" class="checkbox hide-radio" id="checkbox-49">
                I did not know there was a "More Information</label>
                </div>
             
            
                </div>
              <p class="button-form text-right">
              <a href="javascript:void(0)" class="link-btn orange" onclick="$('.pages').hide(); $('#page8').show();">Back</a> 
                <a href="javascript:void(0)" class="link-btn orange" onclick="if($('#survy_form').validationEngine('validate')) { $('.pages').hide(); $('#page10').show(); }">Continue</a> 
              </p>
            </div>
          </div>
        
        
        </div>
        
         <!-- -------------- page no 10  ------------------->
        
        <div id="page10" class="pages">
        
          <div class="row customer-satisfaction-survey">
             
            <div class="col-sm-6">
              <h4> Overall website quality  *</h4>
              <h4>From Worst</h4>
              <div class="clearfix">
              <div class="label-area">
              <label class="label-check" for="checkbox-50">
                <input type="radio" name="website_quality" value="1" class="checkbox hide-radio" id="checkbox-50">
                1 </label>
                </div>
                
                <div class="label-area">
              <label class="label-check" for="checkbox-51">
                <input type="radio" name="website_quality" value="2" class="checkbox hide-radio" id="checkbox-51">
                2 </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-52">
                <input type="radio" name="website_quality" value="3" class="checkbox hide-radio" id="checkbox-52">
                3 </label>
                </div>
               
                <div class="label-area">
              <label class="label-check" for="checkbox-53">
                <input type="radio" name="website_quality" value="4" class="checkbox hide-radio" id="checkbox-53">
                4 </label>
                </div>
                
                <div class="label-area">
              <label class="label-check" for="checkbox-54">
                <input type="radio" name="website_quality" value="5" class="checkbox hide-radio" id="checkbox-54">
                5 </label>
                </div>
                  <div class="label-area">
              <label class="label-check" for="checkbox-55">
                <input type="radio" name="website_quality" value="6" class="checkbox hide-radio" id="checkbox-55">
                6 </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-56">
                <input type="radio" name="website_quality" value="7" class="checkbox hide-radio" id="checkbox-56">
                7 </label>
                </div>
                   <div class="label-area">
              <label class="label-check" for="checkbox-57">
                <input type="radio" class="checkbox hide-radio" name="website_quality" value="8" id="checkbox-57">
                8 </label>
                </div>
                <div class="label-area">
              <label class="label-check" for="checkbox-58">
                <input type="radio" name="website_quality" value="9" class="checkbox hide-radio" id="checkbox-58">
                9 </label>
                </div>
                   <div class="label-area">
              <label class="label-check" for="checkbox-59">
                <input type="radio" name="website_quality" value="10" class="checkbox hide-radio" id="checkbox-59">
                10 </label>
                </div>
             </div>
             <h4>TO Best</h4>


                </div>
                <div class="col-sm-6">
                 <h4> Your Comments </h4>
                <textarea  placeholder="Enter Comment" class="form-control validate[required]" id="message" rows="10" cols="10" name="message"></textarea>
               
              <p class="button-form text-right">
                <a href="javascript:void(0)" class="link-btn orange" onclick="$('.pages').hide(); $('#page9').show();">Back</a> 
                <a href="javascript:void(0)" onclick="submitform();" class="link-btn orange">FINISH</a> 
              </p>
               </div>
            </div>
          </div>
       
       </form><?php */?>
        </div>
      
       
      <!-- end content --> 
      
    </div>
  </div>
  
  <script>
    $('#survy_form').validationEngine('attach');
	var $customer_type = $('input:checkbox[name="customer_type[]"]');
	$customer_type.addClass("validate[required]");

var $occupation = $('input:radio[name="occupation"]');
$occupation.addClass("validate[required]");

var $products_categories = $('input:checkbox[name="products_categories[]"]');
$products_categories.addClass("validate[required]");

var $order_placed = $('input:radio[name="order_placed"]');
$order_placed.addClass("validate[required]");

var $contact_customer_service = $('input:radio[name="contact_customer_service"]');
$contact_customer_service.addClass("validate[required]");


var $desired_product = $('input:radio[name="desired_product"]');
$desired_product.addClass("validate[required]");

var $rate_search_engine = $('input:radio[name="rate_search_engine"]');
$rate_search_engine.addClass("validate[required]");

var $information_required = $('input:checkbox[name="information_required[]"]');
$information_required.addClass("validate[required]");


var $use_more_information = $('input:radio[name="use_more_information"]');
$use_more_information.addClass("validate[required]");


var $website_quality = $('input:radio[name="website_quality"]');
$website_quality.addClass("validate[required]");

$(document).ready(function() {
	$('.pages').hide();
	$('#page1').show();
$('#responsive-menu').sidr();


});
function setupLabel() {
        if ($('.label-check input').length) {
            $('.label-check').each(function(){
                $(this).removeClass('c-on');
            });
            $('.label-check input:checked').each(function(){
                $(this).parent('label').addClass('c-on');
            });               
        };
    };
    $(document).ready(function(){
        $('.label-check').click(function(){
            setupLabel();
        });
        setupLabel();
    });
	
function firstpage() {
	
	if($('#survy_form').validationEngine('validate')) {
		
		
		 if ($('#checkbox-06').is(':checked')) {  
		 
		  if( ($('#check6').val())=='') {
			  
		  alert('please insert data in input field');
		 return false;
		  }
		  
		 }
		   $('.pages').hide(); 
		   
		   $('#page2').show();
		  
		  
		   }
	
	
	}
	
	function thirdpage() {
	
	if($('#survy_form').validationEngine('validate')) {
		
		 if ($('#checkbox-19').is(':checked')) {  
		 
		  if( ($('#check19').val())=='') {
			  
		  alert('please insert data in input field');
		 return false;
		  }
		  
		 }
		   $('.pages').hide(); 
		   
		   $('#page4').show();
		  
		  
		   }
	
	
	}
	function ninepage() {
	
	if($('#survy_form').validationEngine('validate')) {
		
		
		 if ($('#checkbox-45').is(':checked')) {  
		 
		  if( ($('#check45').val())=='') {
			  
		  alert('please insert data in input field');
		 return false;
		  }
		  
		 }
		   $('.pages').hide(); 
		   
		   $('#page9').show();
		  
		  
		   }
	
	
	}
		
		function submitform() { 
		if($('#survy_form').validationEngine('validate')) {
			 
			 var value1 =$('#check6').val();
			 var value2 =$('#check19').val();
			 var value3 =$('#check45').val();
			 $('#checkbox-06').val(value1);
			 $('#checkbox-19').val(value2);
			 $('#checkbox-45').val(value3);
			  $('#survy_form').submit(); 
			 
			 }
		}
$(document).ready(function() {
	$('#googlfm').reload();
	});
</script>
