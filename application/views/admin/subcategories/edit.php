<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Edit Sub Category</h3>
                                </div>
                                <div class="box-body">
                                    <?php echo $message;?>

                                    <?php echo form_open(uri_string(), array('class' => 'form-horizontal', 'id' => 'form-edit_inventory')); ?>
                                    <div class="col-md-7">
                                        
                                        <div class="form-group">
                                            <?php echo lang('subcategory_kdgol2', 'kdgol2', array('class' => 'col-sm-3 control-label')); ?>
                                            <div class="col-sm-9">
                                                <?php echo form_input($kdgol2);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('subcategory_nama', 'nama', array('class' => 'col-sm-3 control-label')); ?>
                                            <div class="col-sm-9">
                                                <?php echo form_input($nama);?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <div class="btn-group">
                                                <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => lang('actions_submit'))); ?>
                                                <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); ?>
                                                <?php echo anchor('admin/subcategories/'.$_SESSION['kdgol'], lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo form_close();?>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>

<script type="text/javascript">
$(document).ready(function() {

    $('#kdgol').change(function(){
        $.ajax({
            type: "POST",
            url: <?php echo '"'.site_url().'admin/inventory/level2/"' ?>+$(this).val(),
            success:function(json){
                var data = json.data,
                firstid = data[0].kdgol2;

                $('#kdgol2').html('');
                for (var i = 0; i < data.length; i++) {
                    $('#kdgol2').append('<option value="'+data[i].kdgol2+'">'+data[i].nama+'</option>')
                }
                
                $.ajax({
                    type: "POST",
                    url: <?php echo '"'.site_url().'admin/inventory/level3/"' ?>+firstid,
                    success:function(json){
                        var data = json.data;
                        
                        $('#kdgol3').html('');
                        for (var i = 0; i < data.length; i++) {
                            $('#kdgol3').append('<option value="'+data[i].kdgol3+'">'+data[i].nama+'</option>')
                        }
                    }
                });

            },
        });
    });
    
    $('#kdgol2').change(function(){
        $.ajax({
            type: "POST",
            url: "<?php echo site_url();?>inventory/level3/"+$(this).val(),
            success:function(json){
                var data = json.data;
                $('#kdgol3').html('');
                for (var i = 0; i < data.length; i++) {
                    $('#kdgol3').append('<option value="'+data[i].kdgol3+'">'+data[i].nama+'</option>')
                }
            },
        });
    });
});
</script>
