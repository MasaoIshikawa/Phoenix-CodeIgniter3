<!doctype html>
<html>
<head>
<title><?php echo $meta['title']; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="<?php echo $meta['description']; ?>">
<meta name="keywords" content="<?php echo $meta['keywords']; ?>">
<style>
#sdr {
	 display:none;
}
</style>
<link href="<?php echo base_url('css/home/jquery.sidr.dark.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('css/home/reset.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('css/home/bootstrap.min.css');?>" rel="stylesheet">
<link href="<?php echo base_url('css/home/global.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('css/home/global-m.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('css/'); ?>/validationEngine.jquery.css" rel="stylesheet">
 
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

 
<script>

var url="<?php echo base_url(); ?>"; 
</script>
<script src="<?php echo base_url('js'); ?>/jquery.min.js"></script>
<script src="<?php echo base_url('js/home/');?>/bootstrap.min.js"></script>
<script src="<?php echo base_url('js/home/');?>/jquery.sidr.min.js"></script>
<script>
$(document).ready(function() {

$('form').validationEngine('attach');

$('#responsive-menu').sidr();

});
</script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<script src="<?php echo base_url('js/languages'); ?>/jquery.validationEngine-en.js"></script>
<script src="<?php echo base_url('js'); ?>/jquery.validationEngine.js"></script>
<script src="<?php echo base_url('js'); ?>/jquery-ui.js"></script>
<script src="<?php echo base_url('js'); ?>/jquery.fileupload.js"></script>
<script src="<?php echo base_url('js'); ?>/jquery.ui.widget.js"></script>
<script src="<?php echo base_url('js'); ?>/datatable.js"></script>
<!--<script src="<?php echo base_url('js'); ?>/jquery-1.2.6.min.js"></script>
-->

</head>
<body>
<div id="wrapper">

<?php $this->load->view('home/header'); ?>


<?php $this->load->view($body); ?>


<?php $this->load->view('home/footer'); ?>

</div>
<!-- FOXYCART -->
<script src="//cdn.foxycart.com/phoenixpeptide/loader.js" async defer></script>
<!-- /FOXYCART -->
</body>

</html>
