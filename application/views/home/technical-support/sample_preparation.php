
 <script>
 $(document).ready(function(){
	 $('.pages').hide();
	 $('#topic_page1').show();
	 
	 $('.tabs').click(function(){
		 var id = $(this).attr('id');
		 $('.pages').hide();
		  $('.tabs').removeClass( "active" );
		 $(this).addClass( "active" );
		 $('#topic_'+id).show();
		 });
	 
	 
	 });
 </script>
<div id="page-body">
<div class="container sample-preparation-content">

<h1>Sample Preparation</h1>

<div class="content-inner">
<ul class="nav-justified category-tabs">
          <li class="active tabs" id="page1"><a href="javascript:void(0)"><?php echo $plasma['title']; ?></a></li>
          <li class="tabs" id="page2"><a href="javascript:void(0)"><?php echo $blood['title']; ?></a></li>
          <li class="tabs" id="page3"><a href="javascript:void(0)"><?php echo $tissue['title']; ?></a></li>
          <li class="tabs" id="page4"><a href="javascript:void(0)"><?php echo $csf['title']; ?></a></li>
        </ul>
        <div class="pages" id="topic_page1">
 <?php echo $plasma['data']; ?>
        
   </div>
    <div class="pages" id="topic_page2">
 
     <?php echo $blood['data']; ?>   
   </div>
    <div class="pages" id="topic_page3">
 <?php echo $tissue['data']; ?>
        
   </div>
    <div class="pages" id="topic_page4">
 
     <?php echo $csf['data']; ?>   
   </div>     
</div>

<!-- end content -->

</div>
</div>	
