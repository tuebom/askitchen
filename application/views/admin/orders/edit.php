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
                                    <h3 class="box-title">Edit Orders</h3>
                                </div>
                                <div class="box-body">
                                    <?php echo $message;?>

                                    <?php echo form_open(uri_string(), array('class' => 'form-horizontal', 'id' => 'form-edit_user')); ?>
                                        <div class="form-group">
                                            <?php echo lang('orders_kdbar', 'kdbar', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($kdbar);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('orders_kdurl', 'kdurl', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($kdurl);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('orders_description', 'nama', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($nama);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('orders_unit', 'satuan', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($satuan);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('orders_brand', 'merk', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($merk);?>
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
        
        $('#btnSubmit').click(function(event) {
            event.preventDefault();
            $('#frmAddress').submit();
        });
        
        $('#kdgol').change(function(){
            $.ajax({
                type: "POST",
                url: "<?php echo site_url();?>orders/level2/"+$(this).val(),
                // dataType: "json",
                // data: {"id":$(this).val()},
                success:function(json){
                    var data = json.data,
                        firstid = data[0].kdgol2;

                    $('#kdgol2').html('');
                    for (var i = 0; i < data.length; i++) {
                        $('#kdgol2').append('<option value="'+data[i].kdgol2+'">'+data[i].nama+'</option>')
                    }

                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url();?>orders/level3/"+firstid,
                        success:function(json){
                            var data = json.data;
                            $('#kdgol3').html('');
                            for (var i = 0; i < data.length; i++) {
                                $('#kdgol3').append('<option value="'+data[i].kdgol3+'">'+data[i].nama+'</option>')
                            }
                        },
                    });
                },
            });
        });
        
        // $('#kdgol').change(function(){
        //     $.ajax({
        //         type: "POST",
        //         url: "<?php echo site_url();?>orders/level2/"+$(this).val(),
        //         success:function(json){
        //             var data = json.data;
        //             $('#kdgol2').html('');
        //             for (var i = 0; i < data.length; i++) {
        //                 $('#kdgol2').append('<option value="'+data[i].kdgol2+'">'+data[i].nama+'</option>')
        //             }
        //         },
        //     });
        // });
        
        $('#kdgol2').change(function(){
            $.ajax({
                type: "POST",
                url: "<?php echo site_url();?>orders/level3/"+$(this).val(),
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
