<?php if($content['tiny_enabled']==1) { ?>
<script type="text/javascript" src="<?php echo base_url()?>js/tiny_mce_new/tiny_mce.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/tiny_mce_new/init_tiny.js"></script>
<?php } ?>
<style>
.form-row{

    padding: 0 !important;
}
</style>
<div id="page-body" class="clearfix">
<?php $this->load->view('admin/left-menu'); ?>

	<!-- end left menu -->

<div id="right-contents">

<!--page title -->
<div class="page-title clearfix">
<h1 class="pull-left">Edit META/Content</h1>
</div>	<!--/page title -->
    <div class="row">
    <div class="col-sm-7 add-user">
    <form action="<?php echo base_url('admin/content/save/'.$content['content_id']); ?>" method="post" >
    <div class="form-row "><input type="text"  placeholder="" value="<?php echo $content['name']; ?>" class="form-control" readonly></div>
    <div class="form-row "><input type="text" placeholder="Title" id="title" name="title" value="<?php echo $content['title']; ?>" class="form-control validate[required]"></div>
    <?php if($content['type']=='meta'){ ?>
    
    <div class="form-row "><input type="text" placeholder="Keywords" id="keywords" name="keywords" value="<?php echo $content['keywords']; ?>" class="form-control validate[required] "></div>
    <div class="form-row "><input type="text" placeholder="Description" id="description" name="description" value="<?php echo $content['description']; ?>" class="form-control validate[required]"></div>
    <?php } else { ?>
    <div class="form-row"><h3>English:</h3><textarea id="data" name="data"  rows="10" class="form-control"><?php echo $content['data']; ?></textarea></div>
    
    <div class="form-row"><h3>Chinese:</h3><textarea id="data_chinese" name="data_chinese"  rows="10" class="form-control"><?php echo $content['data_chinese']; ?></textarea></div>
    
    
    <?php } ?>
    <div class="clearfix view-submit form-row">
    
    <div class="pull-right"><button type="submit" class="link-btn green">Save</button> <button type="button" onClick="window.location='<?php echo base_url('admin/content'); ?>'" class="link-btn grey">Cancel</button></div>
    </div>
    </form>
    </div>
    </div>

</div>	<!-- end right contents -->
</div>
