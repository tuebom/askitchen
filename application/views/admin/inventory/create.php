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
                                    <h3 class="box-title">Create Inventory</h3>
                                </div>
                                <div class="box-body">
                                    <?php echo $message;?>

                                        <?php echo form_open(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_inventory')); ?>
                                            <div class="form-group">
                                                <?php echo lang('inventory_kdbar', 'kdbar', array('class' => 'col-sm-3 control-label')); ?>
                                                <div class="col-sm-9">
                                                    <?php echo form_input($kdbar);?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <?php echo lang('inventory_kdurl', 'kdurl', array('class' => 'col-sm-3 control-label')); ?>
                                                <div class="col-sm-9">
                                                    <?php echo form_input($kdurl);?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <?php echo lang('inventory_description', 'nama', array('class' => 'col-sm-3 control-label')); ?>
                                                <div class="col-sm-9">
                                                    <?php echo form_input($nama);?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <?php echo lang('inventory_group', 'kdgol', array('class' => 'col-sm-3 control-label')); ?>
                                                <div class="col-sm-9">
                                                <select id="kdgol" name="kdgol" class="form-control">
                                                    <option value=""<?=isset($_SESSION['kdgol'])?'': ' selected';?>>-</option>
                                                    <?php
                                                        foreach ($this->data['golongan'] as $itemx) {
                                                            if (isset($_SESSION['kdgol']))
                                                            {
                                                    ?>
                                                    <option value="<?= $itemx->kdgol ?>"<?php if( $itemx->id == $_SESSION['kdgol'] ): ?> selected="selected"<?php endif; ?>><?= $itemx->nama ?></option>
                                                    <?php   } else { ?>
                                                    <option value="<?= $itemx->kdgol ?>"><?= $itemx->nama ?></option>
                                                    <?php } } ?>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <?php echo lang('inventory_group_lv2', 'kdgol2', array('class' => 'col-sm-3 control-label')); ?>
                                                <div class="col-sm-9">
                                                <select id="kdgol2" name="kdgol2" class="form-control">
                                                    <option value=""<?=isset($_SESSION['kdgol2'])?'': ' selected';?>>-</option>
                                                    <?php
                                                        foreach ($this->data['golongan2'] as $itemx) {
                                                            if (isset($_SESSION['kdgol2']))
                                                            {
                                                    ?>
                                                    <option value="<?= $itemx->kdgol2 ?>"<?php if( $itemx->id == $_SESSION['kdgol2'] ): ?> selected="selected"<?php endif; ?>><?= $itemx->nama ?></option>
                                                    <?php   } else { ?>
                                                    <option value="<?= $itemx->kdgol2 ?>"><?= $itemx->nama ?></option>
                                                    <?php } } ?>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <?php echo lang('inventory_group_lv3', 'kdgol3', array('class' => 'col-sm-3 control-label')); ?>
                                                <div class="col-sm-9">
                                                <select id="kdgol3" name="kdgol3" class="form-control">
                                                <?php
                                                    if (isset($this->data['golongan3'])) :
                                                        foreach ($this->data['golongan3'] as $item) {
                                                ?>
                                                <option value="<?= $item->kdgol3 ?>"<?php if( $_SESSION["kdgol3"] == $item->kdgol3 ): ?> selected="selected"<?php endif; ?>><?= $item->nama ?></option>
                                                <?php   }
                                                    endif;
                                                ?>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <?php echo lang('inventory_unit', 'satuan', array('class' => 'col-sm-3 control-label')); ?>
                                                <div class="col-sm-9">
                                                    <?php echo form_input($satuan);?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <?php echo lang('inventory_brand', 'merk', array('class' => 'col-sm-3 control-label')); ?>
                                                <div class="col-sm-9">
                                                    <select id="merk" name="merk" class="form-control">
                                                        <option value=""<?=isset($_SESSION['merk'])?'': ' selected';?>>-</option>
                                                        <?php
                                                            foreach ($this->data['brands'] as $itemx) {
                                                                if (isset($_SESSION['merk']))
                                                                {
                                                        ?>
                                                        <option value="<?= $itemx->name ?>"<?php if( $itemx->id == $_SESSION['merk'] ): ?> selected="selected"<?php endif; ?>><?= $itemx->name ?></option>
                                                        <?php   } else { ?>
                                                        <option value="<?= $itemx->name ?>"><?= $itemx->name ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <?php echo lang('inventory_length', 'pnj', array('class' => 'col-sm-3 control-label')); ?>
                                                <div class="col-sm-9">
                                                    <?php echo form_input($pnj);?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <?php echo lang('inventory_width', 'lbr', array('class' => 'col-sm-3 control-label')); ?>
                                                <div class="col-sm-9">
                                                    <?php echo form_input($lbr);?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <?php echo lang('inventory_height', 'tgi', array('class' => 'col-sm-3 control-label')); ?>
                                                <div class="col-sm-9">
                                                    <?php echo form_input($tgi);?>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <div class="btn-group">
                                                        <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => lang('actions_submit'))); ?>
                                                        <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); ?>
                                                        <?php echo anchor('admin/inventory', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
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
			// alert('test')
			$.ajax({
			    type: "POST",
			    url: "<?php echo site_url();?>inventory/level2/"+$(this).val(),
			    success:function(json){
			        var data = json.data;
			        console.log(data)
			        $('#kdgol2').html('');
			        for (var i = 0; i < data.length; i++) {
			            $('#kdgol2').append('<option value="'+data[i].kdgol2+'">'+data[i].nama+'</option>')
			        }
			    },
			});
		});

		$('#kdgol2').change(function(){
			$.ajax({
				type: "POST",
				url: "<?php echo site_url();?>inventory/level3/"+$(this).val(),
				success:function(json){
					var data = json.data;
					console.log(data)
					$('#kdgol3').html('');
					for (var i = 0; i < data.length; i++) {
						$('#kdgol3').append('<option value="'+data[i].kdgol3+'">'+data[i].nama+'</option>')
					}
				},
			});
		});

    });
</script>