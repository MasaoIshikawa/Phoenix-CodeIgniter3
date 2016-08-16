<div id="page-body">
    <div class="container">
      <h1 class="page-title clearfix">Frequently Asked Questions</h1>
      <div class="content-inner faq-content">
        <h3>If you don't find the answer to your question(s), <a href="<?php echo base_url('contact') ?>">send us an email</a> for technical support</h3>
        	<h4>Click on the topic to find your answers.</h4>
            <ul class="arrow-list clearfix">
 <?php foreach($topics as $topic) { ?>           
<a href="javascript:void(0)"><li  id="<?php echo $topic['id']  ?>" class="col-sm-6 topic_title"><?php echo $topic['title']; ?></li></a> <?php } ?>







            </ul>
        
      <?php foreach($topicdata['topics'] as $row) { ?>
        <div class="faq-section" id="topic_<?php echo $row['id']; ?>">
          <h4><?php echo $row['title']; ?>:</h4>
          <div class="row">
            <?php foreach($topicdata['topic_questions'][$row['id']] as $qrow) { ?>
            <div class="col-sm-6">
              <div class="panel">
                <div class="panel-heading" role="tablist" id="heading32">
                  <div class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $qrow['faq_id'] ?>" aria-expanded="false" aria-controls="collapse32"><?php echo $qrow['question'] ?></a> </div>
                </div>
                <div id="collapse<?php echo $qrow['faq_id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading32">
                  <div class="panel-body"> 
                   <?php echo $qrow['answer'] ?>
                  </div>
                </div>
              </div>
              
              
            </div>
            
            <?php } ?>
            
            <!--/column   -->
            
            
          </div>
        </div>
        <!--/ faq section -->
       <?php } ?>
        
        <!--faq table -->
        <div class="faq-section">
        <h4 style="padding-bottom: 0;">Table 1. Chemiluminescence Detection Instruments</h4>
        <div class="table-responsive">
        <table>
  <tr>
    <th scope="col">Instrument</th>
    <th scope="col">Vender</th>
    <th scope="col">German/European representative</th>
  </tr>
  <tr>
    <td>FluoChem SP™</td>
    <td>Alpha Innotech Corporation</td>
    <td>Biozym Scientific<br />
PO Box D-31833 Hess Oldendorf<br />
Germany<br />
Tel: +49-5152-9020<br />
<a href="#">www.biozym.com/</a><br />
<a href="#">support@biozym.com</a></td>
  </tr>
  <tr>
    <td>Kodak Gel Logic 440 System with PC</td>
    <td>KODAK</td>
    <td>Kontakt informationen<br />
Wenn Sie nicht die richtigen <br />
Informationen gefunden haben, <br />
erhalten Sie hier die aktuellsten <br />
Kontaktinformationen.</td>
  </tr>
  
  <tr>
    <td>ChemiDoc™ XRS System, PC</td>
    <td>Bio-Rad</td>
    <td>
    Bio-Rad<br />
Address to Customer Service<br />
Fax: 49-893-188-4123
    </td>
  </tr>
</table>
</div>
<p><strong>Table 2. Fluorescence Detection Instruments</strong></p>

<div class="table-responsive">
        <table>
  <tr>
    <th scope="col">Instrument</th>
    <th scope="col">Vender</th>
    <th scope="col">German/European representative</th>
  </tr>
  <tr>
    <td>GenePix 4100A (Axon Instrument / <br />
Molecular Devices)</td>
    <td>Molecular Devices</td>
    <td>Molecular Devices<br />
(tel: 49-8996-05880)</td>
  </tr>
  
  <tr>
    <td>KAlphaScan™</td>
    <td>Alpha Innotech Corporation</td>
    <td>Biozym Scientific<br />
PO Box D-31833 Hess Oldendorf<br />
Germany<br />
Tel: +49-5152-9020<br />
<a href="#">www.biozym.com/</a><br />
<a href="#">support@biozym.com</a></td>
  </tr>
  
  <tr>
    <td>ScanArray Lite (Cat. # 900-3011538000)</td>
    <td>PerkinElmer</td>
    <td>
    PerkinElmer LAS (Germany) GmbH<br />
Ferdinand Porsche Ring 17<br />
63110 Rodgau - Jügesheim, <br />
Germany<br />
Customer Care<br />
Tel: 0800 1 81 00 32<br />
Fax: 0800 1 81 00 31<br />
<a href="#">cc.germany@perkinelmer.com</a>
    </td>
  </tr>
  
  
  <tr>
    <td>VersArray ChipReaderer (Cat.# 169-0002)</td>
    <td>Bio-Rad</td>
    <td>
   Bio-Rad<br />
Address to Customer Service <br />
Fax: 49-893-188-4123
    </td>
  </tr>
  
  
  
  <tr>
    <td>GeneChip® Scanner 3000 TG</td>
    <td>Affymetrix</td>
    <td>
    Affymetrix UK Ltd.<br />
UK and Others Tel. +44 (0) 1628 <br />
552550<br />
France Tel. +33 800919505<br />
Germany Tel. +49 1803001334<br />
Fax. +44 (0) 1628 552598<br />
<a href="#">supporteurope@affymetrix.com</a><br />
<a href="#">saleseurope@affymetrix.com</a>
    </td>
  </tr>
  
  
</table>
</div>

        
        </div> 
        
      </div>
      
      <!-- end content --> 
      
    </div>
  </div>
  
  <script>
  $(document).ready(function() {
	 
	  $('.topic_title').click(function() {
		  
		  var id=$(this).attr('id');
		
    $('html, body').animate({
        scrollTop: $("#topic_"+id).offset().top
    }, 2000);
	  
		  
		  });
	  
	  });
  </script>
