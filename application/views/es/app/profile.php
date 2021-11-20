<div style="background-color: white;position: absolute;z-index:2;width: 100%;height: 100%;opacity: 0.7;position: fixed;" id="load">
    <div class="load" >
        <hr/><hr/><hr/><hr/>
        </div>
        <h1 style="position: absolute;top: 60%;left: 43.5%; font-family:'Helvetica Neue'; ">Solucionestai Módulo encuestas</h1>
</div>

<!--
<div class="row" style="height: 350px;background-image: url('img/form_background.jpg');background-size: 100% ">
    
</div>
-->

<div class="container-fluid mt-5" id="main">
    <div class="row justify-content-center mainR" style="padding: 0.1px;">   
        <div class="col-md-8 col-lg-6 col-xl-5 mb-5" id="test">
            <div class="row justify-content-center mt-4">
                <div class=" col-md-5 col-lg-5 col-xl-6">
                    <img class="img-fluid rounded-circle" src="<?= base_url('assets/img/uploads/users/').$user_img;?>" id="user_img">
                </div>
                <div class="col-1">
                    
                    <input type="image" src="<?= base_url('assets/img/camera-2.png');?>" id="proj_img" height="40" style="width: 40px;margin-left: -15px" />
                    <form id="sub-img" method="post" enctype="multipart/form-data">
                        <input type="file" name="userfile" id="my_file" style="display: none;" />
                    </form>
                    <script> 
                    $(document).ready(function(){
                        $('#my_file').change(function(){
                            //e.preventDefault();
                            let d = new FormData( $('#sub-img')[0]  );
                            //console.log(d);
                            $.ajax({
                                url:'<?= site_url('users/upload_image'); ?>' ,
                                method:'POST',  
                                data:d,
                                contentType:false,
                                cache:false,
                                processData:false,
                                success:function(data){
                                    console.log(data);
                                    let img = $.parseJSON(data);
                                    if ( img['file_name'] !== undefined ){
                                        $('#user_img').attr('src' , `<?= base_url('assets/img/uploads/users/'); ?>${img['file_name']}` );
                                        $('#logo_perso').attr('src' , `<?= base_url('assets/img/uploads/users/'); ?>${img['file_name']}` );
                                    }
                                    
                                },
                                error:function(xhr,status,error){
                                    console.log(xhr);
                                    console.log(status);
                                    console.log(error);
                                }
                            });
                        });
                    });
                </script>
                </div>

            </div>

            <?= form_open('users/settings'); ?> 
            <div style="display:none;text-align:center;" class="alert alert-danger">
                <?php if ( validation_errors() ): ?>
                    <?= substr( str_replace('.' , ' | ' , strip_tags(validation_errors() )) , 0 , -3); ?>
                    <script> 
                        $('.alert').css('display','block'); 
                        setTimeout(function(){
                            $('.alert').fadeOut('slow');
                        },10000);
                    </script>
                <?php endif; ?>
            </div>

            <div class="form-group mt-4">
                <label class="fw-bolder" for="name">Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre" name="name" maxlength="30" Value="<?= $user['name'] ;?>" >
            </div>

            <div class="form-group mt-4">
                <label class="fw-bolder" for="email">Correo electrónico</label>
                <input type="email" class="form-control" placeholder="Correo electrónico" name="email" maxlength="30" Value="<?= $user['email'] ;?>"  >
            </div>

            <div class="form-group mt-4">
                <label class="fw-bolder" for="old_password">Antigua contraseña</label>
                <input type="password" class="form-control" placeholder="Antigua contraseña" name="old_password" maxlength="30" >
            </div>

            <div class="form-group mt-4">
                <label class="fw-bolder" for="new_password">Nueva contraseña</label>
                <input type="password" class="form-control" placeholder="Nueva contraseña" name="new_password" maxlength="30" >
            </div>

            <div class="form-group mt-4">
                <label class="fw-bolder" for="new_password_confirm">Confirma nueva contraseña</label>
                <input type="password" class="form-control" placeholder="Confirma nueva contraseña" name="new_password_confirm" maxlength="30" >
            </div>

            <div class="form-group text-center mt-4" style="height: 4%;color: rgb(200,200,200);">
                <a><button type="submit" class="btn bg-green" style="width: 150px">Guardar</button></a>
                <a href="<?= site_url(); ?>"><button class="btn bg-blue" style="margin-left: 10px;width: 150px">Cancelar</button></a>
            </div>

            <?= form_close(); ?>
        </div>
    </div>
</div>