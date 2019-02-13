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
                                    <h3 class="box-title"><?php echo anchor('admin/brands/create', '<i class="fa fa-plus"></i> '. lang('brands_create'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                </div>
                                <div class="box-body">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th><?php echo lang('brands_name');?></th>
                                                <th><?php echo lang('brands_action');?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php foreach ($brands as $values):?>
                                            <tr>
                                                <td><?php echo anchor("admin/brands/edit/".$values->name, htmlspecialchars($values->name, ENT_QUOTES, 'UTF-8')); ?></td>
                                                <td><?php echo anchor("admin/brands/edit/".$values->name, lang('actions_edit')); ?></td>
                                            </tr>
<?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>
