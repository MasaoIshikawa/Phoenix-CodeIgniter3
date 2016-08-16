<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Welcome to our Website</title>
<!-- Bootstrap -->
<link href="<?php echo base_url('css/admin'); ?>/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('css/admin'); ?>/global.css" rel="stylesheet">
<link href="<?php echo base_url('css/admin'); ?>/global-m.css" rel="stylesheet">
<link href="<?php echo base_url('css/'); ?>/validation
Engine.jquery.css" rel="stylesheet">
<!--Fonts -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<!--/Fonts -->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script>

var base_url="<?php echo base_url(); ?>"; 
var url="<?php echo base_url(); ?>"; 
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo base_url('js/languages'); ?>/jquery.validationEngine-en.js"></script>
<script src="<?php echo base_url('js'); ?>/jquery.validationEngine.js"></script>
<script src="<?php echo base_url('js/admin'); ?>/bootstrap.min.js"></script>
<script src="<?php echo base_url('js'); ?>/datatable.js"></script>
<script src="<?php echo base_url('js'); ?>/jquery-ui.js"></script>
<script src="<?php echo base_url('js'); ?>/jquery.fileupload.js"></script>
<script src="<?php echo base_url('js'); ?>/jquery.ui.widget.js"></script>
<script src="<?php echo base_url('js'); ?>/jquery.customSelect.min.js"></script>

<style>
.table-responsive{overflow:visible !important;}
</style>
</head>

<body>
<?php if($this->session->flashdata('message')){ ?>
<div class="popup-outer">
<div class="container">
<div class="col-sm-5 margin-auto">
<div class="popup-content text-center">
<p class="text-right"><a href="javascript:void(0);"  onClick="$('.popup-outer').hide();" class="button-close">X</a></p>
<h2>Confirmation</h2>
<p><?php echo $this->session->flashdata('message'); ?></p>
<p><button onClick="$('.popup-outer').hide();" class="link-btn green">Okay</button> </p>
</div>
</div>
</div>
</div>
<?php } ?>
<div id="wrapper">
<!--header -->
<?php $this->load->view('admin/header'); ?>

<?php $this->load->view($body); ?>
<div id="push"></div>
</div>	<!--/wrapper -->

<!--footer -->
<?php $this->load->view('admin/footer'); ?>	<!--/footer -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('js/admin'); ?>/scripts.js"></script>
<script>
 $("form").validationEngine('attach');
</script>
</body>
</html>
