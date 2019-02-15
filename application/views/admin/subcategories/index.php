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
                                    
                                <div class="box-body table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-right">No.</th>
                                                <th><?= lang('subcategory_kdgol2'); ?></th>
                                                <th><?= lang('subcategory_nama'); ?></th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php 
    $index = (int)$_SESSION['start'];
    foreach ($subcategories as $item):?>
                                            <tr>
                                                <td class="text-right"><?= ++$index; ?></td>
                                                <td><?php echo anchor('admin/subcategories2/'.$item->kdgol2, htmlspecialchars($item->kdgol2, ENT_QUOTES, 'UTF-8')); ?></td>
                                                <td><?php echo htmlspecialchars($item->nama, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td>
                                                    <?php echo anchor('admin/subcategories2/'.$item->kdgol2, 'Add/Edit'); ?>
                                                </td>
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

<script type="text/javascript">
$(document).ready(function(){
        
    $('.dataTables_length').change(function(){
        $.ajax({
            type: "POST",
            url: <?php echo '"'.site_url().'admin/subcategory/setpaging/"' ?> + $('.dataTables_length option:selected').val(),
            success:function(json){
                // var data = json.data;
                location.reload();
            }
        });
    });
});
</script>