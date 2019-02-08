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
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="box box-solid">
                                <!-- <div class="box-header with-border">
                                    <h3 class="box-title">Banner</h3>
                                </div> -->
                                <!-- /.box-header -->
                                <div class="box-body">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                    <?php 
                                        $index = 0;
                                        foreach ($banner as $item) { ?>
                                    <li data-target="#carousel-example-generic" data-slide-to="<?=$index?>" class="<?=$index == 0? 'active':''?>"></li>
                                    <?php $index++; } ?>
                                    </ol>
                                    <div class="carousel-inner">
                                    <?php 
                                        $index = 0;
                                        foreach ($banner as $item) { ?>
                                        <div class="item<?=$index == 0 ? ' active':''?>">
                                            <img src="<?=base_url('images/'.$item->filename)?>" alt="Banner <?=(int)$index+1?>">

                                            <div class="carousel-caption">
                                                Banner <?=(int)$index+1?>
                                            </div>
                                        </div>
                                        <?php $index++; } ?>
                                    </div>
                                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                    <span class="fa fa-angle-left"></span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                    <span class="fa fa-angle-right"></span>
                                    </a>
                                </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>

                    <!-- banner file -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Banner File</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="box-group" id="accordion">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                        <div class="panel box box-primary">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
                                                Banner #<?=(int)$index+1?>
                                            </a>
                                            </h4>
                                        </div>
                                        <div id="collapse<?=(int)$index+1?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="box-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                                            wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                                            nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                            farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                            labore sustainable VHS.
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>

                </section>
            </div>
