
<?php if(!empty($contactus_confirmation)) { ?>
	<div id="contactus-confirmation" class="popup-outer">
<div class="container">
<div class="col-sm-4 margin-auto">
<div class="popup-content text-center">
<div class="text-right"><a href="javascript:void(0);" onClick="$('#contactus-confirmation').hide();" class="button-close"><img src="<?php echo base_url('images/home/close.gif'); ?>" width="22" height="22" alt=""></a></div>
<p><?php echo $contactus_confirmation['data']; ?></p>
</div>
</div>
</div>
</div>
<?php } ?>
<div id="page-body">
<div class="container">

<h1 class="page-title">Contact Us</h1>

<div class="content-inner">
<div class="contact-form row">
<div class="col-sm-8">
<form id="contactform" action="<?php echo base_url('contact/send'); ?>" method="post">
<p><input type="text" placeholder="First Name" id="first_name" name="first_name" class="form-control validate[required,custom[onlyLetterNumber]]"></p>
<p><input type="text" placeholder="Last Name" id="last_name" name="last_name" class="form-control validate[required,custom[onlyLetterNumber]] "></p>
<p><input type="text" placeholder="Email" id="email"  name="email" class="form-control validate[required,custom[email]] "></p>
<p><input type="text" placeholder="Subject"  id="subject" name="subject" class="form-control validate[required,custom[onlyLetterNumber]]"></p>
<p><textarea class="form-control validate[required]" placeholder="Message" id="message" name="message"></textarea></p>
<p class="text-right"><button type="button" onClick="$('#contactform')[0].reset(); $('#contactform').validationEngine('hideAll');" class="link-btn grey">Clear</button> <button class="link-btn orange">Send</button></p>
</form>
</div>
<!--/ -->
<div class="col-sm-4">
<div class="office-address">
<div class="office-country clearfix"><img src="<?php echo base_url('images/home');?>/flag-usa.png" width="60" height="40" alt="">United States
<span>Global headquarters</span></div>
<h4>Phoenix Pharmaceuticals, Inc.</h4>
<p>330 Beach Road<br />
Burlingame, CA 94010<br />
USA</p>

<p>Tel: (650) 558-8898<br />
Toll-free: (800) 988-1205<br />
Fax: (650) 558-1686</p>

<p><a href="#">info@phoenixpeptide.com</a> </p>
</div>
</div>
</div>
<!--/contact form -->
<div class="row">
<div class="col-sm-4">
<div class="office-address">
<div class="office-country clearfix"><img src="<?php echo base_url('images/home');?>/flag-europe.png" width="60" height="40" alt=""> Europe</div>
<h4>Phoenix Europe GmbH</h4>
<p>Viktoriastrasse 3-5<br />
D-76133 Karlsruhe<br />
Germany</p>

<p>Tel: +49 (721) 1208 150<br />
Fax: +49 (721) 1208 1515<br />
<a href="#">europe@phoenixpeptide.eu</a></p>

<p>We speak english<br />
Wir sprechen Deutsch</p>
</div>
</div>
<!--/ -->
<div class="col-sm-4">
<div class="office-address">
<div class="office-country clearfix"><img src="<?php echo base_url('images/home');?>/flag-china.png" width="60" height="40" alt=""> China</div>
<h4>Phoenix Biotech (Beijing) Co., Ltd</h4>
<p>B1109 R&amp;D Plaza<br />
Tsinghua University<br />
Beijing 100084<br />
People's Republic of China</p>

<p>Tel: +010-62790436<br />
Fax: +010-62790437</p>

<p><a href="#">info@phoenixbiotech.net</a><br />
<a href="#">www.phoenixbiotech.net</a></p>
</div>
</div>
<!--/ -->
<div class="col-sm-4">
<div class="office-address">
<div class="office-country clearfix"><img src="<?php echo base_url('images/home');?>/flag-france.png" width="60" height="40" alt=""> Europe</div>
<h4>Phoenix France S.A.S</h4>
<p>3 quai KlÃ©ber<br />
Tour SÃ©bastopol<br />
67000 Strasbourg<br />
France</p>

<p>Tel: +33 (0)3 88 23 70 51<br />
Fax: +33 (0)3 88 23 71 17 <br />
<a href="#">france@phoenixpeptide.eu</a></p>

<p>Nous parlons français</p>
</div>
</div>
<!--/ -->
</div>

<!--/ -->
<h1>Global Distributors</h1>
<div class="row">
<div class="col-sm-3">
<div class="office-address">
<div class="office-country clearfix"><img src="<?php echo base_url('images/home');?>/flag-japan.png" width="60" height="40" alt=""> Japan</div>
<h4>Funakoshi Co., Ltd.</h4>
<p>9-7 Hongo 2-Chome<br />
Bunkyo-Ku, Tokyo 113<br />
Japan</p>

<p>Tel: +81-3-5684-1620<br />
Fax: +81-3-5684-1775<br />
<a href="#">reagent@funakoshi.co.jp</a><br />
<a href="#">www.funakoshi.co.jp</a> </p>
</div>
</div>
<!--/ -->

<div class="col-sm-3">
<div class="office-address">
<div class="office-country clearfix"><img src="<?php echo base_url('images/home');?>/flag-japan.png" width="60" height="40" alt=""> Japan</div>
<h4>SCETI K.K.</h4>
<p>DF kasumigaseki<br />
Chiyoda-ku,Tokyo Japan 1000013<br />
Japan</p>

<p>Tel: +81-3-5510-2652<br />
Fax: +81-3-5510-0133<br />
<a href="#">medical@sceti.co.jp</a> <br />
<a href="#">www.sceti.co.jp</a></p>
</div>
</div>
<!--/ -->

<div class="col-sm-3">
<div class="office-address">
<div class="office-country clearfix"><img src="<?php echo base_url('images/home');?>/flag-south-korea.png" width="60" height="40" alt=""> South Korea</div>
<h4>Woongbee Meditech Inc</h4>
<p>1309-11 Biz Center, SK TECHNO 
PARK<br />
190-1 Sangdaewon-1 Dong<br />
Jungwon-Ku, Seongnam-City, <br />
Kyunggi-Do<br />
Korea 462-721</p>

<p>Tel: 82-31-776-3300<br />
Fax: 82-31-776-3303<br />
<a href="#">woongbee@woongbee.com</a><br />
<a href="#">woongbee@chot.com</a><br />
<a href="#">www.woongbee.com</a></p> 
</div>
</div>
<!--/ -->

<div class="col-sm-3">
<div class="office-address">
<div class="office-country clearfix"><img src="<?php echo base_url('images/home');?>/flag-south-korea.png" width="60" height="40" alt=""> South Korea</div>
<h4>Boo Kyung Sa Co., Ltd.</h4>
<p>Wonkyung Bld 5F<br />
788-16 Yeoksam-dong<br />
Gangnam-gu, Seoul<br />
135-515</p>

<p>Tel: +822-516-7331<br />
Fax: +822-516-3353 or +822-<br />
516-5123
<a href="#">info@bookyungsm.co.kr</a></p>
</div>
</div>
<!--/ -->
</div>

<div class="row">
<div class="col-sm-3">
<div class="office-address">
<div class="office-country clearfix"><img src="<?php echo base_url('images/home');?>/flag-taiwan.png" width="60" height="40" alt=""> Taiwan</div>
<h4>KYS Technology Co. Ltd</h4>
<p>4F, No.88, Baozhong Rd., <br />
Xindian Dist.,<br />
New Taipei City 23144,<br />
Taiwan (R.O.C.)</p>

<p>TEL: 886-2-2911-5233<br />
FAX: 886-2-2911-6855<br />
<a href="#">kystech@gmail.com</a><br />
<a href="#">www.kyst.com.tw</a></p>
</div>
</div>
<!--/ -->

<div class="col-sm-3">
<div class="office-address">
<div class="office-country clearfix"><img src="<?php echo base_url('images/home');?>/flag-australia.png" width="60" height="40" alt=""> Australia</div>
<h4>Abacus ALS Australia</h4>
<p>PO Box 7183<br />
East Brisbane<br />
Brisbane QLD 4169</p>

<p>Toll Free: 1 (800) 222 287<br />
Free Fax: 1 (800) 287 222<br />
Phone: +61 (0)7 3391 9777<br />
Fax: +61 (0)7 3391 9799<br />
<a href="#">info@abacus-als.com</a></p>
</div>
</div>
<!--/ -->

<div class="col-sm-3">
<div class="office-address">
<div class="office-country clearfix"><img src="<?php echo base_url('images/home');?>/flag-newzealand.png" width="60" height="40" alt=""> New Zealand</div>
<h4>Abacus ALS New Zealand</h4>
<p>PO Box 97-923<br />
SAMC<br />
Auckland</p>

<p>Toll Free: 0800 222 170<br />
Free Fax: 0800 222 180<br />
<a href="#">info@abacus-als.co.nz</a></p>
</div>
</div>
<!--/ -->

</div>

</div>

<!-- end content -->

</div>
</div>	
