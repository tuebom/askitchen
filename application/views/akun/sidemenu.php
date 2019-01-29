<script src="<?=base_url('assets/plugins/jqueryform/jquery.form.js');?>"></script>
<script type="text/javascript">
jQuery(document).ready(function($){
    
    $('#btnUpdate').click(function(event) {
        event.preventDefault();
        $('#frmAkun').submit();
    });
      
    function simpanfoto(){
        var userfile=$('#userfile').val();
        
        $('#uploadfotopasien').ajaxForm({
        url:'<?php echo base_url("akun/upload_file"); ?>',
        type: 'post',
        data: {"userfile": userfile},
        
        //  beforeSend: function() {
        //     var percentVal = 'Mengupload 0%';
        //     $('.msg').html(percentVal);
        //  },
        //  uploadProgress: function(event, position, total, percentComplete) {
        //     var percentVal = 'Mengupload ' + percentComplete + '%';
        //     $('.msg').html(percentVal);
        //  },
        //  beforeSubmit: function() {
        //   $('.hasil').html('Silahkan Tunggu ... ');
        //  },
        //  complete: function(xhr) {
        //     $('.msg').html('Mengupload file selesai!');
        //  }, 
        success: function(resp) {
            $('.hasil').html(resp);
            console.log(resp);
            // $(".propic").attr("src",resp);
        },
        });     
    };

    // update profile
    $('.btn-profile').on('click', function (c) {
        $('#userfile').trigger("click");
        // console.log($("<input type='file'/>").get(0).files);
    });
});
</script>    

    <!--content-->
	<div class="content" style="background-color:lightgrey;">
		<div class="container">
			<div class="product-agileinfo-grids w3l">
				<div class="col-md-3">
					<!-- <div class="row">
						<img class="profile" src="<?= site_url('images/men3.jpg'); ?>" alt="profile"/>
						<span class="profile"style=""><b>Nama Member</b><br><i class="fa fa-pencil"></i>&nbsp;<a>Ubah Profil</a></span></a>
					</div>
					<div class="row">
                        <div class>
                            <ul class="tree-list-pad">
                            <li><input type="checkbox" id="item-01" /><label class="tree" for="item-01"><span></span>Profil Saya</label></li>
                            <li><input type="checkbox" id="item-02" /><a href="<?php echo site_url('akun?p=bb'); ?>">Belanjaan Saya</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="propic img-responsive img-circle" src="<?= site_url('images/user.jpg'); ?>" alt="User profile picture">

                            <h4 class="profile-username text-center"><?=$this->data['anggota']->first_name ?> <?=$this->data['anggota']->last_name ?></h4>

                            <!-- <p class="text-muted text-center">Software Engineer</p> -->

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item"><b><a class="profile" href="<?php echo site_url('akun'); ?>">Profil Saya</a></b></li>
                                <li class="list-group-item"><b><a class="profile" href="<?php echo site_url('akun?p=bb'); ?>">Belanjaan Saya</a></b></li>
                                <li class="list-group-item"><b><a class="profile" href="<?php echo site_url('akun?p=histori'); ?>">Histori</a></b></li>
                            </ul>

                            <!-- <a href="#" class="btn btn-primary btn-block btn-profile"><b>Update Profile</b></a> -->
                            <a href="#" class="btn btn-sm btn-default btn-block btn-flat btn-profile">Update Profile</a>
                            <form role="form" name="frmUpload" id="frmUpload" action="javascript:simpanfoto();" method="post" enctype="multipart/form-data">
                                <input id="userfile" name="userfile" type="file" style="display: none;">
                            </form>
                            <div class="form-group">
                                <div class="hasil"></div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
				</div>
