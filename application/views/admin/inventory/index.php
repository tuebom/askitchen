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
                                    <h3 class="box-title"><?php echo anchor('admin/inventory/create', '<i class="fa fa-plus"></i> Create Inventory', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                </div>
                                <div class="box-body table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Kode Barang</th>
                                                <th>Kode URL</th>
                                                <th>Nama Barang</th>
                                                <th>Gol.</th>
                                                <th>Gol. 2</th>
                                                <th>Satuan</th>
                                                <th>Merk</th>
                                                <th class="text-right">Panjang</th>
                                                <th class="text-right">Lebar</th>
                                                <th class="text-right">Tinggi</th>
                                                <th>Gambar</th>
                                                <th>Listrik</th>
                                                <th>Kapasitas</th>
                                                <th>Gas</th>
                                                <th>Berat</th>
                                                <th>Tag</th>
                                                <th>Harga Jual</th>
                                                <th>Diskon</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php foreach ($inventory as $item):?>
                                            <tr>
                                            <td><?php echo htmlspecialchars($item->kdbar, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($item->kdurl, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($item->nama, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($item->kdgol, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($item->kdgol2, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($item->satuan, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($item->merk, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td class="text-right"><?php echo htmlspecialchars($item->pnj, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td class="text-right"><?php echo htmlspecialchars($item->lbr, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td class="text-right"><?php echo htmlspecialchars($item->tgi, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($item->gambar, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($item->listrik, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($item->kapasitas, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($item->gas, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($item->berat, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($item->tag, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($item->hjual, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($item->disc, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td>
                                                    <?php echo anchor('admin/inventory/edit/'.$item->kdurl, 'Edit'); ?>
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
